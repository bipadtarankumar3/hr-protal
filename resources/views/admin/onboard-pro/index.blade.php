@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1">Onboard Pro</h4>
                <p class="text-muted mb-0">Candidate onboarding & KYC verification</p>
            </div>
            {{-- <a href="{{ route('onboard-pros.create') }}" class="btn btn-primary">
                <i class="ri-add-line me-1"></i>New Onboarding
            </a> --}}
        </div>

        <!-- Filter Form -->
        <div class="card shadow-sm mb-4 w-100">
            <div class="card-body">
                <form method="GET" action="{{ route('onboard-pros.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by employee name or department" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
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

        <!-- Onboarding Records Table -->
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($onboard_pros as $onboard)
                            <tr>
                                <td>{{ $onboard->employee_name }}</td>
                                <td>{{ $onboard->department }}</td>
                                <td>
                                    @if($onboard->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($onboard->status == 'in-progress')
                                        <span class="badge bg-info">In Progress</span>
                                    @else
                                        <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>{{ $onboard->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('onboard-pros.show', $onboard->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="{{ route('onboard-pros.edit', $onboard->id) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="ri-inbox-line me-2"></i>No onboarding records found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="w-100 mt-3">
            {{ $onboard_pros->links() }}
        </div>
    
        <!-- Stepper Content -->
        <div class="tab-content">
            <!-- Step 1: Personal Info -->
            <div class="tab-pane fade show active" id="personal">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="ri ri-user-3-line me-1"></i> Personal Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="Amit Das">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="amit@example.com">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="10-digit mobile">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Step 2: Bank Details -->
            <div class="tab-pane fade" id="bank">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="ri ri-bank-line me-1"></i> Bank Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Bank Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">IFSC Code</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Step 3: Documents & KYC -->
            <div class="tab-pane fade" id="documents">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="ri ri-file-copy-2-line me-1"></i> Documents & KYC</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">PAN Card</label>
                                <input type="file" class="form-control">
                                <small class="text-muted">Third-party verification</small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Aadhaar</label>
                                <input type="file" class="form-control">
                                <small class="text-muted">Third-party verification</small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Education Certificates</label>
                                <input type="file" class="form-control">
                                <small class="text-muted">Third-party verification</small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Experience Letters</label>
                                <input type="file" class="form-control">
                                <small class="text-muted">Third-party verification</small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bank Proof</label>
                                <input type="file" class="form-control">
                                <small class="text-muted">Finance verification</small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Photo & Signature</label>
                                <input type="file" class="form-control">
                                <small class="text-muted">HR verification</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Actions -->
        <div class="d-flex justify-content-end gap-2 mt-3">
            <button class="btn btn-outline-secondary">
                <i class="ri ri-save-3-line"></i> Save Draft
            </button>
            <button class="btn btn-primary">
                <i class="ri ri-send-plane-2-line"></i> Submit for Verification
            </button>
        </div>
    </div>
</div>
@endsection
