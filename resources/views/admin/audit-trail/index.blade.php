@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1"><i class="ri ri-time-line me-2"></i>Audit Trail</h4>
      <p class="text-muted">List of recent actions and system activities</p>
    </div>
  </div>

  <!-- Filter Section -->
  <div class="card mb-4 bg-light">
    <div class="card-body">
      <form method="GET" action="{{ route('audit-trails.index') }}" class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Search <small class="text-muted">(Action, Model, User)</small></label>
          <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3 d-flex align-items-end gap-2">
          <button type="submit" class="btn btn-primary w-100">
            <i class="ri-filter-3-line"></i> Apply Filters
          </button>
          <a href="{{ route('audit-trails.index') }}" class="btn btn-outline-secondary">
            <i class="ri-refresh-line"></i> Reset
          </a>
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Action</th>
              <th>Target Model</th>
              <th>User</th>
              <th>Timestamp</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            @forelse($audit_trails as $log)
            <tr>
              <td><span class="badge bg-info">{{ ucfirst($log->action ?? 'N/A') }}</span></td>
              <td>{{ $log->target_model ?? 'N/A' }}</td>
              <td>{{ $log->user_id ?? 'System' }}</td>
              <td>{{ $log->created_at ? $log->created_at->format('d M Y H:i') : 'N/A' }}</td>
              <td><small class="text-muted">{{ Str::limit($log->details ?? 'N/A', 50) }}</small></td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-muted">No audit logs found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $audit_trails->links() }}
  </div>
</div>
@endsection
