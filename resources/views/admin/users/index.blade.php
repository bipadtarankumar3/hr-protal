@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Users</h4>
      <p class="text-muted mb-0">Admin-managed users: create accounts and assign roles/permissions.</p>
    </div>
    <a href="{{ url('/admin/users/create') }}" class="btn btn-primary"><i class="ri ri-add-line"></i> Create User</a>
  </div>

  <!-- Filter Section -->
  <div class="card mb-4 bg-light">
    <div class="card-body">
      <form method="GET" action="{{ route('users.index') }}" class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Search <small class="text-muted">(Name, Email)</small></label>
          <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">Role</label>
          <select name="role" class="form-select">
            <option value="">All Roles</option>
            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="manager" {{ request('role') === 'manager' ? 'selected' : '' }}>Manager</option>
            <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
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

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th class="text-end">Actions</th></tr>
        </thead>
        <tbody>
          @forelse($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><span class="badge bg-label-primary">{{ ucfirst($user->role ?? 'user') }}</span></td>
            <td><span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">{{ $user->is_active ? 'Active' : 'Inactive' }}</span></td>
            <td class="text-end">
              <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
              <form action="{{ url('/admin/users/' . $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-muted">No users found. <a href="{{ url('/admin/users/create') }}">Create one</a></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $users->links() }}
  </div>
</div>
@endsection
