@extends('admin.layouts.app')

@section('content')


 <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 20px; border-radius: 10px; color: white;">
            <div>
                <h4 class="fw-semibold mb-1">Curtain Call</h4>
                <p class="text-muted mb-0" style="color: rgba(255,255,255,0.8);">
                    Manage your resignation requests
                </p>
            </div>
            {{-- <a href="{{ route('curtain-calls.create') }}" class="btn btn-light">
                <i class="ri-add-line me-1"></i>Submit New Resignation
            </a> --}}
        </div>

        <!-- Filter Form -->
        <div class="card shadow-sm mb-4 w-100">
            <div class="card-body">
                <form method="GET" action="{{ route('curtain-calls.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by employee name or reason" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="submitted" {{ request('status') == 'submitted' ? 'selected' : '' }}>Submitted</option>
                            <option value="manager_approved" {{ request('status') == 'manager_approved' ? 'selected' : '' }}>Manager Approved</option>
                            <option value="hr_cleared" {{ request('status') == 'hr_cleared' ? 'selected' : '' }}>HR Cleared</option>
                            <option value="settled" {{ request('status') == 'settled' ? 'selected' : '' }}>Settled</option>
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

        <!-- Resignation List -->
        <div class="card shadow-sm w-100">
            <div class="card-header bg-light">
                <h6 class="mb-0"><i class="ri-list-check me-2"></i>Resignation Requests</h6>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Employee Name</th>
                            <th>Reason</th>
                            <th>Last Working Day</th>
                            <th>Status</th>
                            <th>Submitted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($curtain_calls as $resignation)
                            <tr>
                                <td>{{ $resignation->employee_name ?? 'N/A' }}</td>
                                <td>{{ $resignation->reason ?? 'N/A' }}</td>
                                <td>{{ $resignation->notes ?? 'N/A' }}</td>
                                <td>
                                    @if($resignation->status == 'submitted')
                                        <span class="badge bg-warning">Manager Approval Pending</span>
                                    @elseif($resignation->status == 'manager_approved')
                                        <span class="badge bg-info">HR Review</span>
                                    @elseif($resignation->status == 'hr_cleared')
                                        <span class="badge bg-success">Cleared</span>
                                    @else
                                        <span class="badge bg-secondary">Settled</span>
                                    @endif
                                </td>
                                <td>{{ $resignation->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('curtain-calls.show', $resignation->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="ri-eye-line"></i>View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="ri-inbox-line me-2"></i>No resignation requests found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="w-100 mt-3">
            {{ $curtain_calls->links() }}
        </div>
    </div>
</div>
@endsection
