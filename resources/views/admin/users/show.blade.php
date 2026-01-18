@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0"><i class="ri-eye-line me-2"></i>User Details</h4>
        <div class="btn-group">
          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
            <i class="ri-edit-line me-1"></i>Edit
          </a>
          <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
                  <td width="40%"><strong>Name:</strong></td>
                  <td>{{ $user->name }}</td>
                </tr>
                <tr>
                  <td><strong>Email:</strong></td>
                  <td>{{ $user->email }}</td>
                </tr>
                <tr>
                  <td><strong>Role:</strong></td>
                  <td>
                    @if($user->role)
                      <span class="badge bg-info">{{ $user->role->name }}</span>
                      <small class="text-muted">({{ $user->role->code }})</small>
                    @else
                      <span class="badge bg-secondary">No Role Assigned</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Status:</strong></td>
                  <td>
                    @if($user->is_active)
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
                  <td width="40%"><strong>Created At:</strong></td>
                  <td>{{ $user->created_at->format('d M Y, h:i A') }}</td>
                </tr>
                <tr>
                  <td><strong>Updated At:</strong></td>
                  <td>{{ $user->updated_at->format('d M Y, h:i A') }}</td>
                </tr>
                @if($user->role)
                <tr>
                  <td><strong>Role Description:</strong></td>
                  <td>{{ $user->role->description ?? 'N/A' }}</td>
                </tr>
                @endif
              </table>
            </div>
          </div>
        </div>
      </div>

      @if($user->role && $user->role->permissions)
        <div class="card mt-4">
          <div class="card-header">
            <h5 class="mb-0"><i class="ri-shield-check-line me-2"></i>Role Permissions</h5>
          </div>
          <div class="card-body">
            @php
              $permissions = is_array($user->role->permissions) ? $user->role->permissions : [];
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
              <div class="mt-3">
                <a href="{{ route('role-masters.permissions', $user->role->id) }}" class="btn btn-sm btn-primary">
                  <i class="ri-shield-check-line me-1"></i>Manage Role Permissions
                </a>
              </div>
            @else
              <div class="text-center text-muted py-4">
                <i class="ri-shield-line ri-3x mb-2 d-block"></i>
                <p>No permissions configured for this role.</p>
                @if($user->role)
                  <a href="{{ route('role-masters.permissions', $user->role->id) }}" class="btn btn-primary">
                    <i class="ri-shield-check-line me-1"></i>Configure Permissions
                  </a>
                @endif
              </div>
            @endif
          </div>
        </div>
      @else
        <div class="card mt-4">
          <div class="card-body text-center text-muted py-4">
            <i class="ri-shield-line ri-3x mb-2 d-block"></i>
            <p>No role assigned. Assign a role to view permissions.</p>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
              <i class="ri-edit-line me-1"></i>Assign Role
            </a>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
