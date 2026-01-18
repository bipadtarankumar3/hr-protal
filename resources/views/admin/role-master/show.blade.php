@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0"><i class="ri-eye-line me-2"></i>Role Details</h4>
        <div class="btn-group">
          <a href="{{ route('role-masters.edit', $role_master->id) }}" class="btn btn-warning">
            <i class="ri-edit-line me-1"></i>Edit
          </a>
          <a href="{{ route('role-masters.permissions', $role_master->id) }}" class="btn btn-primary">
            <i class="ri-shield-check-line me-1"></i>Manage Permissions
          </a>
          <a href="{{ route('role-masters.index') }}" class="btn btn-secondary">
            <i class="ri-arrow-left-line me-1"></i>Back
          </a>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-6">
          <div class="card bg-light">
            <div class="card-body">
              <h6 class="text-muted mb-3">Basic Information</h6>
              <table class="table table-borderless mb-0">
                <tr>
                  <td width="40%"><strong>Role Name:</strong></td>
                  <td>{{ $role_master->name }}</td>
                </tr>
                <tr>
                  <td><strong>Role Code:</strong></td>
                  <td><span class="badge bg-info">{{ $role_master->code }}</span></td>
                </tr>
                <tr>
                  <td><strong>Salary Grade:</strong></td>
                  <td>{{ $role_master->salary_grade ?? 'N/A' }}</td>
                </tr>
                <tr>
                  <td><strong>Status:</strong></td>
                  <td>
                    @if($role_master->is_active)
                      <span class="badge bg-success">Active</span>
                    @else
                      <span class="badge bg-secondary">Inactive</span>
                    @endif
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-light">
            <div class="card-body">
              <h6 class="text-muted mb-3">Additional Information</h6>
              <table class="table table-borderless mb-0">
                <tr>
                  <td width="40%"><strong>Description:</strong></td>
                  <td>{{ $role_master->description ?? 'N/A' }}</td>
                </tr>
                <tr>
                  <td><strong>Created At:</strong></td>
                  <td>{{ $role_master->created_at->format('d M Y, h:i A') }}</td>
                </tr>
                <tr>
                  <td><strong>Updated At:</strong></td>
                  <td>{{ $role_master->updated_at->format('d M Y, h:i A') }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-header">
          <h5 class="mb-0"><i class="ri-shield-check-line me-2"></i>Permissions</h5>
        </div>
        <div class="card-body">
          @php
            $permissions = is_array($role_master->permissions) ? $role_master->permissions : (is_string($role_master->permissions) ? json_decode($role_master->permissions, true) : []);
          @endphp
          @if(!empty($permissions))
            <div class="table-responsive">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Module</th>
                    <th class="text-center">Create</th>
                    <th class="text-center">Read</th>
                    <th class="text-center">Update</th>
                    <th class="text-center">Delete</th>
                    <th class="text-center">Extra</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($permissions as $module => $perms)
                    <tr>
                      <td><strong>{{ $module }}</strong></td>
                      <td class="text-center">
                        @if(isset($perms['create']) && $perms['create'])
                          <i class="ri-check-line text-success"></i>
                        @else
                          <i class="ri-close-line text-muted"></i>
                        @endif
                      </td>
                      <td class="text-center">
                        @if(isset($perms['read']) && $perms['read'])
                          <i class="ri-check-line text-success"></i>
                        @else
                          <i class="ri-close-line text-muted"></i>
                        @endif
                      </td>
                      <td class="text-center">
                        @if(isset($perms['update']) && $perms['update'])
                          <i class="ri-check-line text-success"></i>
                        @else
                          <i class="ri-close-line text-muted"></i>
                        @endif
                      </td>
                      <td class="text-center">
                        @if(isset($perms['delete']) && $perms['delete'])
                          <i class="ri-check-line text-success"></i>
                        @else
                          <i class="ri-close-line text-muted"></i>
                        @endif
                      </td>
                      <td class="text-center">
                        @if(isset($perms['extra']) && $perms['extra'])
                          <i class="ri-check-line text-success"></i>
                        @else
                          <i class="ri-close-line text-muted"></i>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="text-center text-muted py-4">
              <i class="ri-shield-line ri-3x mb-2 d-block"></i>
              <p>No permissions configured yet.</p>
              <a href="{{ route('role-masters.permissions', $role_master->id) }}" class="btn btn-primary">
                <i class="ri-shield-check-line me-1"></i>Configure Permissions
              </a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
