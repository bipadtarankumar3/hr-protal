@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Talent Hub</h4>
        <p class="text-muted mb-0">Manage job postings & recruitment pipeline</p>
    </div>
    <a href="{{URL::to('/admin/talent-hub/create')}}" class="btn btn-primary">
        <i class="ri ri-add-line"></i> Create Job
    </a>
</div>

<!-- Filters -->
<div class="card mb-4 bg-light">
    <div class="card-body">
        <form method="GET" action="{{ route('talent-hubs.index') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search <small class="text-muted">(Name, Skills, Department)</small></label>
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <label class="form-label">Experience Level</label>
                <select name="experience_level" class="form-select">
                    <option value="">All Levels</option>
                    <option value="junior" {{ request('experience_level') === 'junior' ? 'selected' : '' }}>Junior</option>
                    <option value="mid" {{ request('experience_level') === 'mid' ? 'selected' : '' }}>Mid</option>
                    <option value="senior" {{ request('experience_level') === 'senior' ? 'selected' : '' }}>Senior</option>
                    <option value="lead" {{ request('experience_level') === 'lead' ? 'selected' : '' }}>Lead</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Sort By</label>
                <select name="sort_by" class="form-select">
                    <option value="applied_date" {{ request('sort_by') === 'applied_date' ? 'selected' : '' }}>Applied Date</option>
                    <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Name</option>
                    <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Recently Added</option>
                </select>
            </div>

            <div class="col-md-2 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="ri ri-filter-3-line"></i> Apply Filters
                </button>
                <a href="{{ route('talent-hubs.index') }}" class="btn btn-outline-secondary">
                    <i class="ri ri-refresh-line"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Job Listings Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Department</th>
                        <th>Experience Level</th>
                        <th>Applied Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($talents as $talent)
                    <tr>
                        <td><strong>{{ $talent->name }}</strong></td>
                        <td>
                            @if($talent->skills)
                                <small class="text-muted">{{ Str::limit($talent->skills, 30) }}</small>
                            @else
                                <span class="badge bg-secondary">N/A</span>
                            @endif
                        </td>
                        <td><span class="badge bg-info">{{ $talent->department ?? 'N/A' }}</span></td>
                        <td>
                            <span class="badge bg-{{ ['junior' => 'success', 'mid' => 'warning', 'senior' => 'danger', 'lead' => 'dark'][$talent->experience_level] ?? 'secondary' }}">
                                {{ ucfirst($talent->experience_level ?? 'N/A') }}
                            </span>
                        </td>
                        <td>{{ $talent->applied_date ? $talent->applied_date->format('d M Y') : 'N/A' }}</td>
                        <td>
                            <span class="badge bg-{{ ['active' => 'success', 'inactive' => 'secondary', 'pending' => 'warning', 'closed' => 'danger'][$talent->status] ?? 'secondary' }}">
                                {{ ucfirst($talent->status ?? 'N/A') }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('talent-hubs.show', $talent->id) }}" class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                            <a href="{{ route('talent-hubs.edit', $talent->id) }}" class="btn btn-sm btn-outline-secondary">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="ri ri-inbox-line me-2"></i>No talents found
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
    {{ $talents->links() }}
</div>
</div>
</div>

@endsection
