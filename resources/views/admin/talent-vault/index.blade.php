@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-folder-user-line me-2 text-primary"></i>Talent Vault</h4>
                <p class="text-muted mb-0">HR repository for candidate data & verification</p>
            </div>
            <a href="#" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" class="btn btn-primary d-flex align-items-center">
                <i class="ri ri-add-line me-1"></i> Add Candidate
            </a>
        </div>

        <!-- Filters -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('talent-vaults.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by candidate name or position" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="applied" {{ request('status') == 'applied' ? 'selected' : '' }}>Applied</option>
                            <option value="selected" {{ request('status') == 'selected' ? 'selected' : '' }}>Selected</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-outline-primary w-100">
                            <i class="ri ri-filter-3-line"></i> Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Candidate Records Table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Candidate Name</th>
                                <th>Position Applied</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $candidate)
                                <tr>
                                    <td>{{ $candidate->candidate_name }}</td>
                                    <td>{{ $candidate->position_applied }}</td>
                                    <td>
                                        @if($candidate->status == 'applied')
                                            <span class="badge bg-info">Applied</span>
                                        @elseif($candidate->status == 'selected')
                                            <span class="badge bg-success">Selected</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $candidate->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('talent-vaults.show', $candidate->id) }}" class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="ri-inbox-line me-2"></i>No candidates found
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
            {{ $employees->links() }}
        </div>
    
           

        <!-- Add Employee Modal -->
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addEmployeeModalLabel"><i class="ri ri-add-line me-1"></i> Add New Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" value="Auto generated" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Date of Joining</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Manager</label>
                                    <input type="text" class="form-control" value="Pulled from Onboard Pro" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Project Code</label>
                                    <input type="text" class="form-control" value="Pulled from Onboard Pro" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Team Code</label>
                                    <input type="text" class="form-control" value="Auto Mapped" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Department</label>
                                    <input type="text" class="form-control" value="Auto Mapped" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Onboarded</option>
                                        <option>Verified</option>
                                        <option>Pending</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Verification Result</label>
                                    <select class="form-select">
                                        <option>Clear</option>
                                        <option>Flagged</option>
                                        <option>Pending</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Verification Agency</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Verification Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Uploaded Report</label>
                                    <input type="file" class="form-control" accept=".pdf,.jpg,.png">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Active / Inactive Employee</label>
                                    <select class="form-select" id="employeeStatus">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" rows="3" placeholder="Optional comments"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> Cancel
                        </button>
                        <button type="button" class="btn btn-primary" id="saveEmployeeBtn">
                            <i class="ri ri-save-3-line"></i> Save Employee
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Employee Modal -->
        <div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-labelledby="viewEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="viewEmployeeModalLabel"><i class="ri ri-eye-line me-1"></i> Employee Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Employee ID</label>
                                <input type="text" class="form-control" value="EMP-001" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="Amit Das" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date of Joining</label>
                                <input type="date" class="form-control" value="2023-01-15" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Manager</label>
                                <input type="text" class="form-control" value="John Doe" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Project Code</label>
                                <input type="text" class="form-control" value="RYDZAA-TECH-002" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Team Code</label>
                                <input type="text" class="form-control" value="TECH-TEAM-A" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Department</label>
                                <input type="text" class="form-control" value="Tech" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" value="Backend Developer" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" value="Verified" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Verification Result</label>
                                <input type="text" class="form-control" value="Clear" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Verification Agency</label>
                                <input type="text" class="form-control" value="ABC Verification" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Verification Date</label>
                                <input type="date" class="form-control" value="2023-02-01" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Employee Status</label>
                                <input type="text" class="form-control" value="Active" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" rows="3" readonly>Good performance</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> Close
                        </button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deactivateModal">
                            <i class="ri ri-user-unfollow-line"></i> Deactivate Employee
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deactivate Confirmation Modal -->
        <div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deactivateModalLabel"><i class="ri ri-alert-line me-1"></i> Confirm Deactivation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to deactivate this employee? Once deactivated, the employee cannot be reactivated again.</p>
                        <div class="alert alert-warning">
                            <strong>Warning:</strong> This action is irreversible. Deactivation will be saved with timestamp.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> Cancel
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i class="ri ri-user-unfollow-line"></i> Confirm Deactivate
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
