@props([
    'id' => 'dynamicModal',
    'title' => 'Modal Title',
    'size' => 'lg',
    'centered' => true,
    'scrollable' => false,
    'headerClass' => 'bg-primary text-white',
    'footer' => true,
    'closeButton' => true,
    'submitButton' => true,
    'submitText' => 'Save',
    'submitClass' => 'btn-primary',
    'cancelText' => 'Cancel',
    'cancelClass' => 'btn-outline-secondary',
    'formAction' => null,
    'formMethod' => 'POST',
    'formId' => null,
    'icon' => null,
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog 
        @if($size === 'sm') modal-sm
        @elseif($size === 'md') 
        @elseif($size === 'lg') modal-lg
        @elseif($size === 'xl') modal-xl
        @elseif($size === 'fullscreen') modal-fullscreen
        @endif
        @if($centered) modal-dialog-centered @endif
        @if($scrollable) modal-dialog-scrollable @endif
    ">
        <div class="modal-content">
            <div class="modal-header {{ $headerClass }}">
                <h5 class="modal-title" id="{{ $id }}Label">
                    @if(isset($icon))
                        <i class="{{ $icon }} me-1"></i>
                    @endif
                    {{ $title }}
                </h5>
                @if($closeButton)
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                @endif
            </div>
            
            @if($formAction)
                <form action="{{ $formAction }}" method="{{ $formMethod }}" @if($formId) id="{{ $formId }}" @endif>
                    @if($formMethod !== 'GET')
                        @csrf
                        @if($formMethod === 'PUT' || $formMethod === 'PATCH')
                            @method('PUT')
                        @elseif($formMethod === 'DELETE')
                            @method('DELETE')
                        @endif
                    @endif
                    <div class="modal-body">
                        {{ $slot }}
                    </div>
                    @if($footer)
                        <div class="modal-footer">
                            <button type="button" class="btn {{ $cancelClass }}" data-bs-dismiss="modal">
                                <i class="ri ri-close-line"></i> {{ $cancelText }}
                            </button>
                            @if($submitButton)
                                <button type="submit" class="btn {{ $submitClass }}">
                                    <i class="ri ri-save-3-line"></i> {{ $submitText }}
                                </button>
                            @endif
                        </div>
                    @endif
                </form>
            @else
                <div class="modal-body">
                    {{ $slot }}
                </div>
                @if($footer)
                    <div class="modal-footer">
                        <button type="button" class="btn {{ $cancelClass }}" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> {{ $cancelText }}
                        </button>
                        @if($submitButton)
                            <button type="button" class="btn {{ $submitClass }}" id="{{ $id }}SubmitBtn">
                                <i class="ri ri-save-3-line"></i> {{ $submitText }}
                            </button>
                        @endif
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-populate modal with data attributes
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('{{ $id }}');
        if (modal) {
            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                if (button) {
                    // Get data attributes from trigger button
                    const modalData = button.dataset;
                    
                    // Populate form fields if form exists
                    const form = modal.querySelector('form');
                    if (form) {
                        Object.keys(modalData).forEach(key => {
                            if (key.startsWith('field')) {
                                const fieldName = key.replace('field', '').toLowerCase();
                                const input = form.querySelector(`[name="${fieldName}"]`);
                                if (input) {
                                    input.value = modalData[key];
                                }
                            }
                        });
                    }
                }
            });
        }
    });
</script>
@endpush

