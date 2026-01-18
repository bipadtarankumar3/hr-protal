@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <h4 class="mb-1"><i class="ri ri-building-line me-2"></i>Departments</h4>
          <p class="text-muted">Manage all departments in your organization</p>
        </div>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">
          <i class="ri-add-line me-1"></i>Add Department
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
          <form method="GET" action="{{ route('departments.index') }}" class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Search <small class="text-muted">(Name, Code, Description)</small></label>
              <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
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
            <div class="col-md-3 d-flex align-items-end gap-2">
              <button type="submit" class="btn btn-primary w-100">
                <i class="ri-filter-3-line"></i> Apply Filters
              </button>
              <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary">
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
              <th>Department Name</th>
              <th>Code</th>
              <th>Description</th>
              <th>Head</th>
              <th>Budget</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($departments as $dept)
              <tr>
                <td><strong>{{ $dept->name }}</strong></td>
                <td><span class="badge bg-info">{{ $dept->code }}</span></td>
                <td>{{ Str::limit($dept->description ?? 'N/A', 40) }}</td>
                <td>{{ $dept->head_id ? 'Employee #' . $dept->head_id : 'Unassigned' }}</td>
                <td>{{ $dept->budget ? '$' . number_format($dept->budget, 2) : 'N/A' }}</td>
                <td>
                  <a href="{{ route('departments.show', $dept->id) }}" class="btn btn-sm btn-info" title="View">
                    <i class="ri-eye-line"></i>
                  </a>
                  <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-sm btn-warning" title="Edit">
                    <i class="ri-edit-line"></i>
                  </a>
                  <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                      <i class="ri-delete-line"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted py-4">
                  <i class="ri-inbox-2-line ri-3x mb-2 d-block"></i>
                  No departments found. <a href="{{ route('departments.create') }}">Create one</a>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      @if($departments->hasPages())
        <div class="d-flex justify-content-center mt-4">
          {{ $departments->links() }}
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
