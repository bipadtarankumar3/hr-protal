@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-flight-takeoff-line me-2 text-primary"></i>Time Away</h4>
                <p class="text-muted mb-0">Apply for leave or record past absences</p>
            </div>
            <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#applyLeaveModal">
                <i class="ri ri-add-line me-1"></i> New Absence
            </button>
        </div>
        <!-- Leave Balance Summary -->
        <div class="row g-3 mb-4">
            <div class="col-md-2">
                <div class="card text-center shadow-sm border-0 bg-gradient-primary text-white">
                    <div class="card-body">
                        <h6><i class="ri ri-sun-line"></i> Casual Leave</h6>
                        <h4 class="fw-semibold mb-0">4</h4>
                        <small class="text-white-50">Remaining</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm border-0 bg-gradient-info text-white">
                    <div class="card-body">
                        <h6><i class="ri ri-hospital-line"></i> Sick Leave</h6>
                        <h4 class="fw-semibold mb-0">6</h4>
                        <small class="text-white-50">Remaining</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm border-0 bg-gradient-success text-white">
                    <div class="card-body">
                        <h6><i class="ri ri-award-line"></i> Earned Leave</h6>
                        <h4 class="fw-semibold mb-0">10</h4>
                        <small class="text-white-50">Remaining</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm border-0 bg-gradient-danger text-white">
                    <div class="card-body">
                        <h6><i class="ri ri-money-dollar-circle-line"></i> LOP</h6>
                        <h4 class="fw-semibold mb-0">—</h4>
                        <small class="text-white-50">Unpaid</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Absence Application Form -->
        <form>
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="ri ri-flight-takeoff-line me-1"></i> Apply for Absence</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label"><i class="ri ri-list-check-2"></i> Leave Type</label>
                            <select class="form-select">
                                <option>Select Leave Type</option>
                                <option>Casual Leave</option>
                                <option>Sick Leave</option>
                                <option>Earned Leave</option>
                                <option>LOP</option>
                                <option>Comp Off</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><i class="ri ri-calendar-event-line"></i> From Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><i class="ri ri-calendar-event-fill"></i> To Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="ri ri-question-line"></i> Reason (Optional)</label>
                            <textarea class="form-control" rows="3" placeholder="Reason for absence..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="ri ri-mail-send-line"></i> Manager Approval (Mandatory)</label>
                            <input type="file" class="form-control">
                            <small class="text-muted">Upload email or written approval from reporting manager</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Important Note -->
            <div class="alert alert-warning d-flex align-items-center">
                <i class="ri ri-alert-line me-2 fs-4"></i>
                Leave can be applied after absence. Attendance for missed days will be auto-adjusted after approval.
            </div>
            <!-- Actions -->
            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-outline-secondary">
                    <i class="ri ri-close-line"></i> Cancel
                </button>
                <button class="btn btn-primary">
                    <i class="ri ri-send-plane-2-line"></i> Submit Absence
                </button>
            </div>
        </form>
        <!-- New Absence Modal (Demo) -->
        <div class="modal fade" id="applyLeaveModal" tabindex="-1" aria-labelledby="applyLeaveModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="applyLeaveModalLabel"><i class="ri ri-add-line me-1"></i> Apply for New Absence</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Leave Type</label>
                                    <select class="form-select">
                                        <option>Select Leave Type</option>
                                        <option>Casual Leave</option>
                                        <option>Sick Leave</option>
                                        <option>Earned Leave</option>
                                        <option>LOP</option>
                                        <option>Comp Off</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">From Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">To Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Reason (Optional)</label>
                                    <textarea class="form-control" rows="3" placeholder="Reason for absence..."></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Manager Approval (Mandatory)</label>
                                    <input type="file" class="form-control">
                                    <small class="text-muted">Upload email or written approval from reporting manager</small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> Cancel
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            <i class="ri ri-send-plane-2-line"></i> Submit Absence (Demo)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
