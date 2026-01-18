@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-add-line me-2"></i>Create New Role</h4>
      
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Validation Errors:</strong>
          <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <form method="POST" action="{{ route('role-masters.store') }}">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Role Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                   placeholder="e.g. HR Manager" value="{{ old('name') }}" required>
            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Role Code <span class="text-danger">*</span></label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" 
                   placeholder="e.g. HRMGR" value="{{ old('code') }}" required>
            @error('code') <span class="invalid-feedback">{{ $message }}</span> @enderror
            <small class="text-muted">Unique code identifier for this role</small>
          </div>
          <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                      placeholder="Role description and responsibilities" rows="3">{{ old('description') }}</textarea>
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Salary Grade</label>
            <input type="text" name="salary_grade" class="form-control @error('salary_grade') is-invalid @enderror" 
                   placeholder="e.g. Grade A, Level 5" value="{{ old('salary_grade') }}">
            @error('salary_grade') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="form-check form-switch mt-2">
              <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
              <label class="form-check-label" for="is_active">Active</label>
            </div>
          </div>
        </div>

        <div class="alert alert-info mt-3">
          <i class="ri-information-line me-2"></i>
          <strong>Note:</strong> After creating the role, you can manage permissions separately using the "Manage Permissions" button.
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('role-masters.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Create Role</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
