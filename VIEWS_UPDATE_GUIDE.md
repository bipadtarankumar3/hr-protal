# Views Update Guide - Making All Views Dynamic

## Overview
This guide explains how to update all admin views to use dynamic modals and model fields.

## Pattern for Index Views

### 1. Replace static create links with modal triggers
**Before:**
```blade
<a href="{{ route('module.create') }}" class="btn btn-primary">Create</a>
```

**After:**
```blade
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Create
</button>
```

### 2. Replace action buttons with modal triggers
**Before:**
```blade
<a href="{{ route('module.show', $item->id) }}" class="btn btn-sm btn-outline-primary">View</a>
<a href="{{ route('module.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
```

**After:**
```blade
<button type="button" 
        class="btn btn-sm btn-outline-primary" 
        data-modal-id="viewModal"
        data-modal-url="{{ route('module.show', $item->id) }}">
    View
</button>
<button type="button" 
        class="btn btn-sm btn-outline-secondary" 
        data-modal-id="editModal"
        data-modal-url="{{ route('module.edit', $item->id) }}">
    Edit
</button>
<form action="{{ route('module.destroy', $item->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
</form>
```

### 3. Use model fields dynamically in table
**Before:**
```blade
<td>{{ $item->some_field ?? 'N/A' }}</td>
```

**After:**
```blade
<td>{{ $item->field_name ?? 'N/A' }}</td>
<!-- Use relationships -->
<td>{{ $item->relation->name ?? 'N/A' }}</td>
```

### 4. Add dynamic modals at the bottom
```blade
<!-- Create Modal -->
@component('admin.components.modal', [
    'id' => 'createModal',
    'title' => 'Create Record',
    'formAction' => route('module.store'),
    'formMethod' => 'POST'
])
    @component('admin.components.modal-form-field', [
        'name' => 'field_name',
        'label' => 'Field Label',
        'type' => 'text',
        'required' => true
    ])
    @endcomponent
@endcomponent

<!-- Edit Modal -->
@component('admin.components.modal', [
    'id' => 'editModal',
    'title' => 'Edit Record',
    'formAction' => route('module.update', ':id'),
    'formMethod' => 'PUT'
])
    <!-- Same fields as create -->
@endcomponent

<!-- View Modal -->
@component('admin.components.modal', [
    'id' => 'viewModal',
    'title' => 'View Record',
    'submitButton' => false
])
    <div id="viewContent">Loading...</div>
@endcomponent
```

## Field Type Mapping

Based on field names and model casts:

- `email` → type: 'email'
- `password` → type: 'password'
- `phone`, `mobile` → type: 'tel'
- `date`, `*_date` → type: 'date'
- `description`, `content`, `notes`, `reason` → type: 'textarea'
- `status`, `type`, `category` → type: 'select'
- `*_id` (foreign keys) → type: 'select' with related model options
- `is_*`, `has_*` → type: 'checkbox'
- `amount`, `salary`, `budget`, `price` → type: 'number'
- Default → type: 'text'

## Example: Complete Index View

```blade
@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">Module Name</h4>
            <p class="text-muted mb-0">Description</p>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="ri ri-add-line me-1"></i> Create New
        </button>
    </div>

    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('module.index') }}" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><span class="badge bg-{{ $item->status == 'active' ? 'success' : 'secondary' }}">{{ $item->status }}</span></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-modal-id="viewModal" data-modal-url="{{ route('module.show', $item->id) }}">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-modal-id="editModal" data-modal-url="{{ route('module.edit', $item->id) }}">Edit</button>
                                <form action="{{ route('module.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No records found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $items->links() }}
        </div>
    </div>
</div>

<!-- Modals -->
@component('admin.components.modal', [
    'id' => 'createModal',
    'title' => 'Create Record',
    'formAction' => route('module.store'),
    'formMethod' => 'POST'
])
    @component('admin.components.modal-form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'required' => true
    ])
    @endcomponent
@endcomponent

@component('admin.components.modal', [
    'id' => 'editModal',
    'title' => 'Edit Record',
    'formAction' => route('module.update', ':id'),
    'formMethod' => 'PUT'
])
    @component('admin.components.modal-form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'required' => true
    ])
    @endcomponent
@endcomponent

@component('admin.components.modal', [
    'id' => 'viewModal',
    'title' => 'View Record',
    'submitButton' => false
])
    <div id="viewContent">Loading...</div>
@endcomponent
@endsection
```

## Checklist for Each View

- [ ] Replace create link with modal trigger button
- [ ] Update table columns to use actual model fields
- [ ] Replace view/edit links with modal trigger buttons
- [ ] Add delete form with confirmation
- [ ] Add create modal with all model fields
- [ ] Add edit modal with all model fields
- [ ] Add view modal (read-only)
- [ ] Use relationships for foreign key displays
- [ ] Add proper field types based on model
- [ ] Test all CRUD operations

## Quick Reference: Model Field Types

Check the model's `$fillable` and `$casts` arrays to determine:
- Field names → use in forms
- Field types → from casts (date, boolean, decimal, etc.)
- Relationships → for select options and display

