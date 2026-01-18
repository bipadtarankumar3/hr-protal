@extends('admin.layouts.app')

@section('content')


 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Learn Zone</h4>
        <p class="text-muted mb-0">
            Internal policies, SOPs & training resources
        </p>
    </div>
    <a href="{{ route('learn-zones.create') }}" class="btn btn-primary">
        <i class="ri ri-upload-line"></i> Upload Document
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('learn-zones.index') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by course name" value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary w-100">
                    <i class="ri ri-search-line"></i> Search
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Knowledge Table -->
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($learn_zones as $course)
                    <tr>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ Str::limit($course->description, 50) }}</td>
                        <td>
                            @if($course->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $course->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('learn-zones.show', $course->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="ri-eye-line"></i>
                            </a>
                            <a href="{{ route('learn-zones.edit', $course->id) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="ri-edit-line"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="ri-inbox-line me-2"></i>No courses found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="mt-3">
    {{ $learn_zones->links() }}
</div>
</div>
</div>

@endsection
