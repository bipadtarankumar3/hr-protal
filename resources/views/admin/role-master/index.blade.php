@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Role Master</h4>
        <p class="text-muted mb-0">
            Define organization roles & reporting hierarchy
        </p>
    </div>
    <a href="{{ route('role-masters.create') }}" class="btn btn-primary">
        <i class="ri ri-add-line"></i> Create Role
    </a>
</div>

<!-- Filter Form -->
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <form method="GET" action="{{ route('role-masters.index') }}" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by role name or description" value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-outline-primary w-100">
                    <i class="ri-search-line me-1"></i>Filter
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Roles Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Role Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($role_masters as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ Str::limit($role->description, 50) }}</td>
                            <td>
                                @if($role->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $role->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('role-masters.show', $role->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                <a href="{{ route('role-masters.edit', $role->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="ri-inbox-line me-2"></i>No roles found
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="mt-3">
    {{ $role_masters->links() }}
</div>
</div>
</div>

@endsection
