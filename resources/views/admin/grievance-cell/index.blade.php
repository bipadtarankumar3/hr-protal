@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <div>
        <h4 class="mb-1"><i class="ri ri-service-line me-2"></i>Grievance Cell</h4>
        <p class="text-muted mb-0">Manage and track all grievances</p>
      </div>
      {{-- <a href="{{ route('grievance-cells.create') }}" class="btn btn-primary">
        <i class="ri-add-line me-1"></i>New Grievance
      </a> --}}
    </div>
  </div>

  <!-- Filter Form -->
  <div class="card mb-3 shadow-sm">
    <div class="card-body">
      <form method="GET" action="{{ route('grievance-cells.index') }}" class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Search</label>
          <input type="text" name="search" class="form-control" placeholder="Search by subject or description" value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select">
            <option value="">All Status</option>
            <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
            <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
            <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
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

  <!-- Grievances Table -->
  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>Subject</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($grievance_cells as $grievance)
            <tr>
              <td>{{ $grievance->subject }}</td>
              <td>{{ Str::limit($grievance->description, 50) }}</td>
              <td>
                @if($grievance->status == 'open')
                  <span class="badge bg-info">Open</span>
                @elseif($grievance->status == 'in-progress')
                  <span class="badge bg-warning">In Progress</span>
                @elseif($grievance->status == 'resolved')
                  <span class="badge bg-success">Resolved</span>
                @else
                  <span class="badge bg-secondary">Closed</span>
                @endif
              </td>
              <td>{{ $grievance->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('grievance-cells.show', $grievance->id) }}" class="btn btn-sm btn-outline-primary">
                  <i class="ri-eye-line"></i>
                </a>
                <a href="{{ route('grievance-cells.edit', $grievance->id) }}" class="btn btn-sm btn-outline-secondary">
                  <i class="ri-edit-line"></i>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-muted">
                <i class="ri-inbox-line me-2"></i>No grievances found
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $grievance_cells->links() }}
  </div>
</div>
@endsection
