# Dynamic Modal Component Usage Guide

## Overview

The dynamic modal component system provides a reusable, flexible way to create Bootstrap modals throughout the HR Portal application. It includes:

1. **Modal Component** (`resources/views/admin/components/modal.blade.php`)
2. **Form Field Component** (`resources/views/admin/components/modal-form-field.blade.php`)
3. **JavaScript Helper** (`public/admin-assets/js/dynamic-modal.js`)

## Basic Usage

### Simple Modal with Form

```blade
@component('admin.components.modal', [
    'id' => 'createModal',
    'title' => 'Create New Record',
    'icon' => 'ri ri-add-line',
    'size' => 'lg',
    'formAction' => route('users.store'),
    'formMethod' => 'POST',
    'submitText' => 'Create'
])
    @component('admin.components.modal-form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' => 'Enter name',
        'required' => true
    ])
    @endcomponent
    
    @component('admin.components.modal-form-field', [
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email',
        'placeholder' => 'Enter email',
        'required' => true
    ])
    @endcomponent
@endcomponent

<!-- Trigger Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Create New
</button>
```

### Modal with Data Attributes

```blade
<!-- Button with data attributes -->
<button type="button" 
        class="btn btn-info" 
        data-modal-id="editModal"
        data-field-name="John Doe"
        data-field-email="john@example.com"
        data-modal-title="Edit User">
    Edit User
</button>

<!-- Modal Component -->
@component('admin.components.modal', [
    'id' => 'editModal',
    'title' => 'Edit User',
    'formAction' => route('users.update', 1),
    'formMethod' => 'PUT'
])
    @component('admin.components.modal-form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text'
    ])
    @endcomponent
    
    @component('admin.components.modal-form-field', [
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email'
    ])
    @endcomponent
@endcomponent
```

### Modal with AJAX Load

```blade
<!-- Button to load data via AJAX -->
<button type="button" 
        class="btn btn-success" 
        data-modal-id="viewModal"
        data-modal-url="/admin/users/1"
        data-modal-title="View User Details">
    View Details
</button>

<!-- Modal Component -->
@component('admin.components.modal', [
    'id' => 'viewModal',
    'title' => 'View Details',
    'submitButton' => false,
    'cancelText' => 'Close'
])
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" id="view-name" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" id="view-email" readonly>
        </div>
    </div>
@endcomponent
```

## Modal Component Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `id` | string | 'dynamicModal' | Unique modal ID |
| `title` | string | 'Modal Title' | Modal title text |
| `icon` | string | null | Icon class (e.g., 'ri ri-add-line') |
| `size` | string | 'lg' | Modal size: 'sm', 'md', 'lg', 'xl', 'fullscreen' |
| `centered` | boolean | true | Center modal vertically |
| `scrollable` | boolean | false | Make modal scrollable |
| `headerClass` | string | 'bg-primary text-white' | CSS classes for header |
| `footer` | boolean | true | Show footer |
| `closeButton` | boolean | true | Show close button |
| `submitButton` | boolean | true | Show submit button |
| `submitText` | string | 'Save' | Submit button text |
| `submitClass` | string | 'btn-primary' | Submit button CSS classes |
| `cancelText` | string | 'Cancel' | Cancel button text |
| `cancelClass` | string | 'btn-outline-secondary' | Cancel button CSS classes |
| `formAction` | string | null | Form action URL |
| `formMethod` | string | 'POST' | Form method: 'GET', 'POST', 'PUT', 'PATCH', 'DELETE' |
| `formId` | string | null | Form ID attribute |

## Form Field Component Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | required | Field name attribute |
| `label` | string | required | Field label text |
| `type` | string | 'text' | Input type: 'text', 'email', 'password', 'date', 'select', 'textarea', 'checkbox', 'radio' |
| `value` | string | null | Field value |
| `placeholder` | string | '' | Placeholder text |
| `required` | boolean | false | Make field required |
| `readonly` | boolean | false | Make field readonly |
| `disabled` | boolean | false | Disable field |
| `options` | array | [] | Options for select/radio (key => value) |
| `rows` | integer | 3 | Rows for textarea |
| `helpText` | string | null | Help text below field |
| `class` | string | '' | Additional CSS classes |

## JavaScript API

### Open Modal with Data

```javascript
DynamicModal.open('modalId', {
    name: 'John Doe',
    email: 'john@example.com'
}, {
    title: 'Edit User',
    formAction: '/admin/users/1',
    formMethod: 'PUT'
});
```

### Load Modal Data via AJAX

```javascript
DynamicModal.load('modalId', '/admin/users/1', {
    title: 'View User Details'
});
```

### Close Modal

```javascript
DynamicModal.close('modalId');
```

### Submit Form via AJAX

```javascript
DynamicModal.submit('formId', {
    modalId: 'modalId',
    reload: true,
    onSuccess: function(data) {
        console.log('Success:', data);
    },
    onError: function(error) {
        console.error('Error:', error);
    }
});
```

## Data Attributes for Buttons

You can use data attributes on buttons to automatically populate modals:

- `data-modal-id` - Modal ID to open
- `data-modal-url` - URL to load data from (AJAX)
- `data-modal-action` - Form action URL
- `data-modal-method` - Form method
- `data-modal-title` - Modal title
- `data-field-{fieldname}` - Field value (e.g., `data-field-name="John"`)

## Examples

### Create Form Modal

```blade
@component('admin.components.modal', [
    'id' => 'createUserModal',
    'title' => 'Create User',
    'icon' => 'ri ri-user-add-line',
    'formAction' => route('users.store'),
    'formMethod' => 'POST',
    'submitText' => 'Create User'
])
    @component('admin.components.modal-form-field', [
        'name' => 'name',
        'label' => 'Full Name',
        'type' => 'text',
        'required' => true
    ])
    @endcomponent
    
    @component('admin.components.modal-form-field', [
        'name' => 'email',
        'label' => 'Email Address',
        'type' => 'email',
        'required' => true
    ])
    @endcomponent
    
    @component('admin.components.modal-form-field', [
        'name' => 'role',
        'label' => 'Role',
        'type' => 'select',
        'options' => ['admin' => 'Administrator', 'user' => 'User'],
        'required' => true
    ])
    @endcomponent
@endcomponent
```

### Edit Form Modal

```blade
@component('admin.components.modal', [
    'id' => 'editUserModal',
    'title' => 'Edit User',
    'icon' => 'ri ri-edit-line',
    'formAction' => route('users.update', ':id'),
    'formMethod' => 'PUT',
    'submitText' => 'Update User'
])
    @component('admin.components.modal-form-field', [
        'name' => 'name',
        'label' => 'Full Name',
        'type' => 'text'
    ])
    @endcomponent
    
    @component('admin.components.modal-form-field', [
        'name' => 'email',
        'label' => 'Email Address',
        'type' => 'email'
    ])
    @endcomponent
@endcomponent

<script>
// Update form action with actual ID
document.querySelector('[data-modal-id="editUserModal"]').addEventListener('click', function() {
    const userId = this.dataset.userId;
    const form = document.querySelector('#editUserModal form');
    form.action = form.action.replace(':id', userId);
});
</script>
```

### View/Read-only Modal

```blade
@component('admin.components.modal', [
    'id' => 'viewUserModal',
    'title' => 'User Details',
    'icon' => 'ri ri-eye-line',
    'submitButton' => false,
    'cancelText' => 'Close'
])
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold">Name</label>
            <p class="mb-0" id="view-user-name">-</p>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold">Email</label>
            <p class="mb-0" id="view-user-email">-</p>
        </div>
    </div>
@endcomponent
```

## Best Practices

1. **Always use unique IDs** for each modal instance
2. **Include CSRF token** in forms (automatically handled)
3. **Validate on both client and server** side
4. **Use appropriate modal sizes** based on content
5. **Provide clear labels and help text** for form fields
6. **Handle errors gracefully** with user-friendly messages
7. **Use AJAX for better UX** when loading/updating data

## Migration from Static Modals

To migrate existing static modals to dynamic components:

1. Replace the modal HTML with `@component('admin.components.modal', [...])`
2. Replace form fields with `@component('admin.components.modal-form-field', [...])`
3. Update trigger buttons to use data attributes or JavaScript API
4. Test functionality thoroughly

