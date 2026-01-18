@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1">Hire Desk</h4>
                <p class="text-muted mb-0">Shortlisted candidates & offer management</p>
            </div>
            <a href="{{ route('hire-desks.create') }}" class="btn btn-outline-primary">
                <i class="ri-add-line me-1"></i>New Hire
            </a>
        </div>

        <!-- Filter Form -->
        <div class="card shadow-sm mb-4 w-100">
            <div class="card-body">
                <form method="GET" action="{{ route('hire-desks.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by job title or department" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
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

        <!-- Hire Desk Table -->
        <div class="card border-0 shadow w-100">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Job Title</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($hire_desks as $hire)
                                <tr>
                                    <td>{{ $hire->job_title }}</td>
                                    <td>{{ $hire->department }}</td>
                                    <td>
                                        @if($hire->status == 'open')
                                            <span class="badge bg-info">Open</span>
                                        @elseif($hire->status == 'in-progress')
                                            <span class="badge bg-warning">In Progress</span>
                                        @else
                                            <span class="badge bg-secondary">Closed</span>
                                        @endif
                                    </td>
                                    <td>{{ $hire->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('hire-desks.show', $hire->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="ri-eye-line"></i>View
                                        </a>
                                        <a href="{{ route('hire-desks.edit', $hire->id) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="ri-inbox-line me-2"></i>No hire desk records found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="w-100 mt-3">
            {{ $hire_desks->links() }}
        </div>
    </div>
</div>
@endsection
