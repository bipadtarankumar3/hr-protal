@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <div>
        <h4 class="mb-1"><i class="ri ri-mail-send-line me-2"></i>Offer Letters</h4>
        <p class="text-muted mb-0">Generate and manage offer letters for candidates</p>
      </div>
      <a href="{{ route('offer-letters.create') }}" class="btn btn-primary">
        <i class="ri-add-line me-1"></i>Compose Offer
      </a>
    </div>
  </div>

  <!-- Filter Form -->
  <div class="card mb-3 shadow-sm">
    <div class="card-body">
      <form method="GET" action="{{ route('offer-letters.index') }}" class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Search</label>
          <input type="text" name="search" class="form-control" placeholder="Search by employee name or position" value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select">
            <option value="">All Status</option>
            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="sent" {{ request('status') == 'sent' ? 'selected' : '' }}>Sent</option>
            <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
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

  <!-- Offer Letters Table -->
  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>Employee Name</th>
            <th>Position</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($offer_letters as $offer)
            <tr>
              <td>{{ $offer->employee_name }}</td>
              <td>{{ $offer->position }}</td>
              <td>
                @if($offer->status == 'draft')
                  <span class="badge bg-secondary">Draft</span>
                @elseif($offer->status == 'sent')
                  <span class="badge bg-info">Sent</span>
                @elseif($offer->status == 'accepted')
                  <span class="badge bg-success">Accepted</span>
                @else
                  <span class="badge bg-danger">Rejected</span>
                @endif
              </td>
              <td>{{ $offer->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('offer-letters.show', $offer->id) }}" class="btn btn-sm btn-outline-primary">
                  <i class="ri-eye-line"></i>
                </a>
                <a href="{{ route('offer-letters.edit', $offer->id) }}" class="btn btn-sm btn-outline-secondary">
                  <i class="ri-edit-line"></i>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-muted">
                <i class="ri-inbox-line me-2"></i>No offer letters found
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $offer_letters->links() }}
  </div>
</div>
@endsection
