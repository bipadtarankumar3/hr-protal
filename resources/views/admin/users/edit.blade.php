@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-edit-line me-2"></i>Edit User</h4>
      
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

      <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                   placeholder="John Doe" value="{{ old('name', $user->name) }}" required>
            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                   placeholder="john@example.com" value="{{ old('email', $user->email) }}" required>
            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Leave blank to keep current password">
            @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
            <small class="text-muted">Leave blank to keep current password. Minimum 8 characters if changing.</small>
          </div>
          <div class="col-md-6">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" 
                   placeholder="Confirm password">
          </div>
          <div class="col-md-6">
            <label class="form-label">Role</label>
            <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
              <option value="">No Role</option>
              @foreach($roles as $role)
                <option value="{{ $role->id }}" 
                        {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                  {{ $role->name }} ({{ $role->code }})
                </option>
              @endforeach
            </select>
            @error('role_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
            <small class="text-muted">Assign a role from Role Master</small>
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="form-check form-switch mt-2">
              <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" 
                     {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
              <label class="form-check-label" for="is_active">Active</label>
            </div>
            <small class="text-muted">Inactive users cannot log in</small>
          </div>
        </div>

        <div class="alert alert-info mt-3">
          <i class="ri-information-line me-2"></i>
          <strong>Note:</strong> Changing the user's role will update their permissions based on the role's configuration in Role Master.
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Update User</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
