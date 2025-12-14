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
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#submitResignationModal">
                <i class="ri-add-line me-1"></i>Submit New Resignation
            </button>
        </div>

<!-- Employee Details (Pre-filled) -->
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-user-line me-2"></i>Employee Details</h6>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3 text-center">
                <img src="https://via.placeholder.com/80" alt="Employee Avatar" class="rounded-circle mb-2" style="width: 80px; height: 80px;">
                <strong>EMP-001</strong>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Name</label>
                <div>Amit Das</div>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Designation</label>
                <div>Backend Developer</div>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Reporting Manager</label>
                <div>Rohit Sharma</div>
            </div>
        </div>
    </div>
</div>

<!-- Resignation List -->
<div class="card shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-list-check me-2"></i>Resignation Requests</h6>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Submission Date</th>
                    <th>Reason</th>
                    <th>Last Working Day</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>15 Dec 2025</td>
                    <td>Career Growth</td>
                    <td>31 Dec 2025</td>
                    <td>
                        <span class="badge bg-warning">Manager Approval Pending</span>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar bg-warning" style="width: 40%;"></div>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewStatusModal">
                            <i class="ri-eye-line"></i> View Status
                        </button>
                    </td>
                </tr>
                <!-- Add more rows if needed -->
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


<!-- Submit Resignation Modal -->
<div class="modal fade" id="submitResignationModal" tabindex="-1" aria-labelledby="submitResignationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submitResignationModalLabel">Submit New Resignation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="resignationForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Reason for Resignation</label>
                            <select class="form-select" required>
                                <option value="">Select Reason</option>
                                <option>Personal Reasons</option>
                                <option>Career Growth</option>
                                <option>Higher Studies</option>
                                <option>Relocation</option>
                                <option>Health Issues</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Proposed Last Working Day</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Comments (Optional)</label>
                            <textarea class="form-control" rows="3" placeholder="You may share additional comments..."></textarea>
                        </div>
                    </div>
                    <div class="alert alert-warning border-0 mt-3" style="background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);">
                        <i class="ri-alert-line me-2"></i>
                        Once submitted, your resignation will be reviewed by your reporting manager and HR. You will be notified about your confirmed Last Working Day.
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="ri-close-line me-1"></i>Cancel
                </button>
                <button type="submit" form="resignationForm" class="btn btn-danger">
                    <i class="ri-send-plane-line me-1"></i>Submit Resignation
                </button>
            </div>
        </div>
    </div>
</div>

<!-- View Status Modal -->
<div class="modal fade" id="viewStatusModal" tabindex="-1" aria-labelledby="viewStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewStatusModalLabel">Resignation Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="progress mb-3" style="height: 10px;">
                    <div class="progress-bar bg-warning" style="width: 40%;"></div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="ri-check-line text-success me-2"></i>Resignation Submitted</span>
                        <span class="badge bg-success">Completed</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="ri-time-line text-warning me-2"></i>Manager Approval</span>
                        <span class="badge bg-warning">Pending</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="ri-time-line text-secondary me-2"></i>HR Clearance</span>
                        <span class="badge bg-secondary">Pending</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="ri-time-line text-secondary me-2"></i>Final Settlement</span>
                        <span class="badge bg-secondary">Pending</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="ri-time-line text-secondary me-2"></i>Relieving Letter</span>
                        <span class="badge bg-secondary">Pending</span>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
