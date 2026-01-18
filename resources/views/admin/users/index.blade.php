@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <h4 class="mb-1"><i class="ri ri-user-line me-2"></i>Users</h4>
          <p class="text-muted">Manage system users and assign roles</p>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
          <i class="ri-add-line me-1"></i>Create User
        </a>
      </div>

      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="ri-check-line me-2"></i>{{ $message }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <!-- Filter Section -->
      <div class="card mb-3 bg-light">
        <div class="card-body">
          <form method="GET" action="{{ route('users.index') }}" class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Search <small class="text-muted">(Name, Email)</small></label>
              <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Role</label>
              <select name="role_id" class="form-select">
                <option value="">All Roles</option>
                @foreach($roles as $role)
                  <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label">Status</label>
              <select name="is_active" class="form-select">
                <option value="">All</option>
                <option value="true" {{ request('is_active') === 'true' ? 'selected' : '' }}>Active</option>
                <option value="false" {{ request('is_active') === 'false' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
              <button type="submit" class="btn btn-primary w-100">
                <i class="ri-filter-3-line"></i> Apply Filters
              </button>
              <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                <i class="ri-refresh-line"></i> Reset
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="table-light">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created Date</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $user)
              <tr>
                <td><strong>{{ $user->name }}</strong></td>
                <td>{{ $user->email }}</td>
                <td>
                  @if($user->role)
                    <span class="badge bg-info">{{ $user->role->name }}</span>
                  @else
                    <span class="badge bg-secondary">No Role</span>
                  @endif
                </td>
                <td>
                  @if($user->is_active)
                    <span class="badge bg-success">Active</span>
                  @else
                    <span class="badge bg-secondary">Inactive</span>
                  @endif
                </td>
                <td>{{ $user->created_at->format('d M Y') }}</td>
                <td class="text-end">
                  <div class="btn-group" role="group">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info" title="View">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="Edit">
                      <i class="ri-edit-line"></i>
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                        <i class="ri-delete-line"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted py-4">
                  <i class="ri-inbox-2-line ri-3x mb-2 d-block"></i>
                  No users found. <a href="{{ route('users.create') }}">Create one</a>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      @if($users->hasPages())
        <div class="d-flex justify-content-center mt-4">
          {{ $users->links() }}
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
