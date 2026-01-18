/**
 * Dynamic Modal Helper
 * Provides utilities for working with Bootstrap modals dynamically
 */

class DynamicModal {
    /**
     * Open a modal and populate it with data
     * @param {string} modalId - The ID of the modal
     * @param {object} data - Data to populate the modal with
     * @param {object} options - Additional options
     */
    static open(modalId, data = {}, options = {}) {
        const modalElement = document.getElementById(modalId);
        if (!modalElement) {
            console.error(`Modal with ID "${modalId}" not found`);
            return;
        }

        const modal = new bootstrap.Modal(modalElement);
        
        // Populate form fields if data is provided
        if (data && Object.keys(data).length > 0) {
            Object.keys(data).forEach(key => {
                const field = modalElement.querySelector(`[name="${key}"]`);
                if (field) {
                    if (field.type === 'checkbox' || field.type === 'radio') {
                        field.checked = data[key];
                    } else {
                        field.value = data[key] || '';
                    }
                }
            });
        }

        // Set modal title if provided
        if (options.title) {
            const titleElement = modalElement.querySelector('.modal-title');
            if (titleElement) {
                titleElement.textContent = options.title;
            }
        }

        // Set form action if provided
        if (options.formAction) {
            const form = modalElement.querySelector('form');
            if (form) {
                form.action = options.formAction;
            }
        }

        // Set form method if provided
        if (options.formMethod) {
            const form = modalElement.querySelector('form');
            if (form) {
                const methodInput = form.querySelector('input[name="_method"]');
                if (methodInput) {
                    methodInput.value = options.formMethod;
                } else if (options.formMethod !== 'POST') {
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = options.formMethod;
                    form.appendChild(methodField);
                }
            }
        }

        modal.show();
    }

    /**
     * Close a modal
     * @param {string} modalId - The ID of the modal
     */
    static close(modalId) {
        const modalElement = document.getElementById(modalId);
        if (modalElement) {
            const modal = bootstrap.Modal.getInstance(modalElement);
            if (modal) {
                modal.hide();
            }
        }
    }

    /**
     * Load data via AJAX and populate modal
     * @param {string} modalId - The ID of the modal
     * @param {string} url - URL to fetch data from
     * @param {object} options - Additional options
     */
    static load(modalId, url, options = {}) {
        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            this.open(modalId, data, options);
        })
        .catch(error => {
            console.error('Error loading modal data:', error);
        });
    }

    /**
     * Submit form via AJAX
     * @param {string} formId - The ID of the form
     * @param {object} options - Additional options
     */
    static submit(formId, options = {}) {
        const form = document.getElementById(formId);
        if (!form) {
            console.error(`Form with ID "${formId}" not found`);
            return;
        }

        const formData = new FormData(form);
        const url = form.action || window.location.href;
        const method = form.method || 'POST';

        fetch(url, {
            method: method,
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (options.onSuccess) {
                    options.onSuccess(data);
                } else {
                    // Default success behavior
                    this.close(options.modalId || 'dynamicModal');
                    if (options.reload) {
                        window.location.reload();
                    }
                }
            } else {
                if (options.onError) {
                    options.onError(data);
                } else {
                    console.error('Form submission error:', data);
                }
            }
        })
        .catch(error => {
            console.error('Error submitting form:', error);
            if (options.onError) {
                options.onError(error);
            }
        });
    }

    /**
     * Initialize modal triggers with data attributes
     */
    static init() {
        document.addEventListener('click', function(e) {
            const trigger = e.target.closest('[data-modal-id]');
            if (trigger) {
                const modalId = trigger.getAttribute('data-modal-id');
                const dataUrl = trigger.getAttribute('data-modal-url');
                const dataAction = trigger.getAttribute('data-modal-action');
                const dataMethod = trigger.getAttribute('data-modal-method');
                const dataTitle = trigger.getAttribute('data-modal-title');
                
                // Collect data attributes
                const data = {};
                Array.from(trigger.attributes).forEach(attr => {
                    if (attr.name.startsWith('data-field-')) {
                        const fieldName = attr.name.replace('data-field-', '');
                        data[fieldName] = attr.value;
                    }
                });

                const options = {
                    title: dataTitle,
                    formAction: dataAction,
                    formMethod: dataMethod,
                };

                if (dataUrl) {
                    this.load(modalId, dataUrl, options);
                } else {
                    this.open(modalId, data, options);
                }
            }
        });
    }
}

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => DynamicModal.init());
} else {
    DynamicModal.init();
}

// Make it globally available
window.DynamicModal = DynamicModal;

