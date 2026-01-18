@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <h4 class="mb-1"><i class="ri ri-briefcase-line me-2"></i>Talent Hub</h4>
          <p class="text-muted">Manage job postings and recruitment pipeline</p>
        </div>
        <a href="{{ route('talent-hubs.create') }}" class="btn btn-primary">
          <i class="ri-add-line me-1"></i>Create Job
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
          <form method="GET" action="{{ route('talent-hubs.index') }}" class="row g-3">
            <div class="col-md-3">
              <label class="form-label">Search <small class="text-muted">(Job Title, Skills, Department)</small></label>
              <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
              <label class="form-label">Department</label>
              <select name="department_id" class="form-select">
                <option value="">All Departments</option>
                @foreach($departments as $dept)
                  <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label">Experience Level</label>
              <select name="experience_level" class="form-select">
                <option value="">All Levels</option>
                <option value="junior" {{ request('experience_level') === 'junior' ? 'selected' : '' }}>Junior</option>
                <option value="mid" {{ request('experience_level') === 'mid' ? 'selected' : '' }}>Mid</option>
                <option value="senior" {{ request('experience_level') === 'senior' ? 'selected' : '' }}>Senior</option>
                <option value="lead" {{ request('experience_level') === 'lead' ? 'selected' : '' }}>Lead</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Published</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Draft</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label">Sort By</label>
              <select name="sort_by" class="form-select">
                <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Recently Added</option>
                <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Job Title</option>
                <option value="applied_date" {{ request('sort_by') === 'applied_date' ? 'selected' : '' }}>Applied Date</option>
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
              <th>Job Title</th>
              <th>Department</th>
              <th>Location</th>
              <th>Experience</th>
              <th>Skills</th>
              <th>Application Limit</th>
              <th>Status</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($talents as $talent)
              <tr>
                <td><strong>{{ $talent->name }}</strong></td>
                <td>
                  @if($talent->departmentRelation)
                    <span class="badge bg-info">{{ $talent->departmentRelation->name }}</span>
                  @elseif($talent->department)
                    <span class="badge bg-info">{{ $talent->department }}</span>
                  @else
                    <span class="badge bg-secondary">N/A</span>
                  @endif
                </td>
                <td>
                  @if($talent->location)
                    <span class="badge bg-secondary">{{ $talent->location }}</span>
                  @else
                    <span class="text-muted">N/A</span>
                  @endif
                </td>
                <td>
                  @php
                    $levelColors = ['junior' => 'success', 'mid' => 'warning', 'senior' => 'danger', 'lead' => 'dark'];
                    $color = $levelColors[$talent->experience_level] ?? 'secondary';
                    $levelLabels = ['junior' => 'Fresher', 'mid' => 'Experienced'];
                  @endphp
                  <span class="badge bg-{{ $color }}">
                    {{ $levelLabels[$talent->experience_level] ?? ucfirst($talent->experience_level ?? 'N/A') }}
                  </span>
                </td>
                <td>
                  @if($talent->skills)
                    <small class="text-muted">{{ Str::limit($talent->skills, 30) }}</small>
                  @else
                    <span class="badge bg-secondary">N/A</span>
                  @endif
                </td>
                <td>
                  @if($talent->application_limit)
                    <span class="badge bg-primary">{{ $talent->application_limit }}</span>
                  @else
                    <span class="text-muted">Unlimited</span>
                  @endif
                </td>
                <td>
                  @php
                    $statusColors = ['active' => 'success', 'inactive' => 'secondary', 'pending' => 'warning', 'closed' => 'danger'];
                    $statusLabels = ['active' => 'Published', 'pending' => 'Draft'];
                    $statusColor = $statusColors[$talent->status] ?? 'secondary';
                    $statusLabel = $statusLabels[$talent->status] ?? ucfirst($talent->status ?? 'N/A');
                  @endphp
                  <span class="badge bg-{{ $statusColor }}">
                    {{ $statusLabel }}
                  </span>
                </td>
                <td class="text-end">
                  <div class="btn-group" role="group">
                    <a href="{{ route('talent-hubs.show', $talent->id) }}" class="btn btn-sm btn-info" title="View">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="{{ route('talent-hubs.edit', $talent->id) }}" class="btn btn-sm btn-warning" title="Edit">
                      <i class="ri-edit-line"></i>
                    </a>
                    <form action="{{ route('talent-hubs.destroy', $talent->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this job?')">
                        <i class="ri-delete-line"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center text-muted py-4">
                  <i class="ri-inbox-2-line ri-3x mb-2 d-block"></i>
                  No jobs found. <a href="{{ route('talent-hubs.create') }}">Create one</a>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      @if($talents->hasPages())
        <div class="d-flex justify-content-center mt-4">
          {{ $talents->links() }}
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
