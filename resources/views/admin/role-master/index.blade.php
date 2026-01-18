@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <h4 class="mb-1"><i class="ri ri-shield-user-line me-2"></i>Role Master</h4>
          <p class="text-muted">Manage organization roles and permissions</p>
        </div>
        <a href="{{ route('role-masters.create') }}" class="btn btn-primary">
          <i class="ri-add-line me-1"></i>Create Role
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
          <form method="GET" action="{{ route('role-masters.index') }}" class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Search <small class="text-muted">(Name, Code, Description)</small></label>
              <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
              <label class="form-label">Status</label>
              <select name="is_active" class="form-select">
                <option value="">All Status</option>
                <option value="true" {{ request('is_active') === 'true' ? 'selected' : '' }}>Active</option>
                <option value="false" {{ request('is_active') === 'false' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Sort By</label>
              <select name="sort_by" class="form-select">
                <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Recently Created</option>
                <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Name</option>
                <option value="code" {{ request('sort_by') === 'code' ? 'selected' : '' }}>Code</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label">Order</label>
              <select name="sort_order" class="form-select">
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
              </select>
            </div>
            <div class="col-md-1 d-flex align-items-end gap-2">
              <button type="submit" class="btn btn-primary w-100">
                <i class="ri-filter-3-line"></i> Filter
              </button>
            </div>
          </form>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="table-light">
            <tr>
              <th>Role Name</th>
              <th>Code</th>
              <th>Description</th>
              <th>Salary Grade</th>
              <th>Status</th>
              <th>Created Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($role_masters as $role)
              <tr>
                <td><strong>{{ $role->name }}</strong></td>
                <td><span class="badge bg-info">{{ $role->code }}</span></td>
                <td>{{ Str::limit($role->description ?? 'N/A', 40) }}</td>
                <td>{{ $role->salary_grade ?? 'N/A' }}</td>
                <td>
                  @if($role->is_active)
                    <span class="badge bg-success">Active</span>
                  @else
                    <span class="badge bg-secondary">Inactive</span>
                  @endif
                </td>
                <td>{{ $role->created_at->format('d M Y') }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ route('role-masters.show', $role->id) }}" class="btn btn-sm btn-info" title="View">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="{{ route('role-masters.edit', $role->id) }}" class="btn btn-sm btn-warning" title="Edit">
                      <i class="ri-edit-line"></i>
                    </a>
                    <a href="{{ route('role-masters.permissions', $role->id) }}" class="btn btn-sm btn-primary" title="Manage Permissions">
                      <i class="ri-shield-check-line"></i>
                    </a>
                    <form action="{{ route('role-masters.destroy', $role->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this role?')">
                        <i class="ri-delete-line"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center text-muted py-4">
                  <i class="ri-inbox-2-line ri-3x mb-2 d-block"></i>
                  No roles found. <a href="{{ route('role-masters.create') }}">Create one</a>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      @if($role_masters->hasPages())
        <div class="d-flex justify-content-center mt-4">
          {{ $role_masters->links() }}
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
