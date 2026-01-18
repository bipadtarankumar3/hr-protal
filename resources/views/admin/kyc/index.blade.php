@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <div>
        <h4 class="mb-1"><i class="ri ri-file-list-3-line me-2"></i>KYC & Documents</h4>
        <p class="text-muted mb-0">Manage and verify candidate/employee documents</p>
      </div>
      <a href="{{ route('kyc.create') }}" class="btn btn-primary">
        <i class="ri-add-line me-1"></i>New KYC
      </a>
    </div>
  </div>

  <!-- Filter Form -->
  <div class="card mb-3 shadow-sm">
    <div class="card-body">
      <form method="GET" action="{{ route('kyc.index') }}" class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Search</label>
          <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select">
            <option value="">All Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
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

  <!-- KYC Records Table -->
  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($kycs as $record)
            <tr>
              <td>{{ $record->user_name }}</td>
              <td>{{ $record->email }}</td>
              <td>
                @if($record->status == 'pending')
                  <span class="badge bg-warning">Pending</span>
                @elseif($record->status == 'verified')
                  <span class="badge bg-success">Verified</span>
                @else
                  <span class="badge bg-danger">Rejected</span>
                @endif
              </td>
              <td>{{ $record->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('kyc.show', $record->id) }}" class="btn btn-sm btn-outline-primary">
                  <i class="ri-eye-line"></i>
                </a>
                <a href="{{ route('kyc.edit', $record->id) }}" class="btn btn-sm btn-outline-secondary">
                  <i class="ri-edit-line"></i>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-muted">
                <i class="ri-inbox-line me-2"></i>No KYC records found
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $kycs->links() }}
  </div>
</div>
@endsection
