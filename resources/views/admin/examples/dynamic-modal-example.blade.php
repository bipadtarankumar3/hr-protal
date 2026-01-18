@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-semibold mb-4">Dynamic Modal Examples</h4>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modal Usage Examples</h5>
                    
                    <!-- Example 1: Simple Modal with Form -->
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="ri ri-add-line me-1"></i> Create New Record
                    </button>

                    <!-- Example 2: Modal with Data Attributes -->
                    <button type="button" 
                            class="btn btn-info mb-2" 
                            data-modal-id="editModal"
                            data-field-name="John Doe"
                            data-field-email="john@example.com"
                            data-modal-title="Edit User">
                        <i class="ri ri-edit-line me-1"></i> Edit with Data Attributes
                    </button>

                    <!-- Example 3: Modal with AJAX Load -->
                    <button type="button" 
                            class="btn btn-success mb-2" 
                            data-modal-id="viewModal"
                            data-modal-url="/admin/users/1"
                            data-modal-title="View User Details">
                        <i class="ri ri-eye-line me-1"></i> Load via AJAX
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Example 1: Create Modal -->
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
    
    @component('admin.components.modal-form-field', [
        'name' => 'role',
        'label' => 'Role',
        'type' => 'select',
        'options' => ['admin' => 'Admin', 'user' => 'User', 'manager' => 'Manager'],
        'required' => true
    ])
    @endcomponent
@endcomponent

<!-- Example 2: Edit Modal -->
@component('admin.components.modal', [
    'id' => 'editModal',
    'title' => 'Edit Record',
    'icon' => 'ri ri-edit-line',
    'size' => 'lg',
    'formAction' => route('users.update', 1),
    'formMethod' => 'PUT',
    'submitText' => 'Update'
])
    @component('admin.components.modal-form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'required' => true
    ])
    @endcomponent
    
    @component('admin.components.modal-form-field', [
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email',
        'required' => true
    ])
    @endcomponent
@endcomponent

<!-- Example 3: View Modal (Read-only) -->
@component('admin.components.modal', [
    'id' => 'viewModal',
    'title' => 'View Details',
    'icon' => 'ri ri-eye-line',
    'size' => 'lg',
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

@endsection

