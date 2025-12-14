@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-flight-takeoff-line me-2 text-primary"></i>Time Away</h4>
                <p class="text-muted mb-0">Apply for absence (CL, Sick, Earned, etc.)</p>
            </div>
            <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#applyLeaveModal">
                <i class="ri ri-add-line me-1"></i> New Absence
            </button>
        </div>

        <!-- Auto-Sync Information -->
        <div class="alert alert-info mb-4">
            <h6><i class="ri ri-sync-line me-1"></i> Auto-Sync Features:</h6>
            <ol class="mb-0">
                <li>Auto-syncs with PulseLog (attendance)</li>
                <li>Updates leave balance in LeaveTrack</li>
                <li>Finance HR sees impact in PayPulse</li>
            </ol>
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
        {{-- <form>
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="ri ri-flight-takeoff-line me-1"></i> Absence Application</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label"><i class="ri ri-list-check-2"></i> Leave Type (Drop Down)</label>
                            <select class="form-select">
                                <option>Select Leave Type</option>
                                <option>Casual Leave</option>
                                <option>Sick Leave</option>
                                <option>Earned Leave</option>
                                <option>LOP</option>
                                <option>Comp Off</option>
                                <option>Maternity</option>
                                <option>Paternity</option>
                                <option>Occasional</option>
                            </select>
                            <small class="text-muted">Shows whatever HR Saved as absence type in "Leave Track"</small>
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
                            <label class="form-label"><i class="ri ri-mail-send-line"></i> Manager Approval (MANDATE)</label>
                            <input type="file" class="form-control">
                            <small class="text-muted">Manager Approval mail to be Uploaded.</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Example Alert -->
            <div class="alert alert-warning mb-4">
                <h6><i class="ri ri-information-line me-1"></i> Example:</h6>
                <p class="mb-0">Today at night something emergency happened, this can be happened with anyone, so employee will let manager know and will be absent for 3 days suppose, so after three days, he should come and make the absence application, on which dates he/she was absent (before that manager approval mail -> should be uploaded). Now, in this scenario, Employee might have missed giving attendance for that week, and no pre-populated 8.00hrs will be shown.</p>
            </div>
            <!-- Important Note -->
            <div class="alert alert-danger d-flex align-items-center mb-4">
                <i class="ri ri-alert-line me-2 fs-4"></i>
                <div>
                    <strong>Note:</strong> Once a Leave is ended, deduct those many days from the "Leave Type". [IMPORTANT]<br>
                    When the page gets refresh or employee comes back to take leave again, he/she will see those many days are deducted from leave balance.
                </div>
            </div>
            <!-- On-Taking Leave -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0"><i class="ri ri-check-circle-line me-1"></i> On-Taking Leave</h6>
                </div>
                <div class="card-body">
                    <ol>
                        <li>Pulse Log Sync → Auto-fill 8 hrs per approved day → Status = leave in attendance</li>
                        <li>Leave Track Sync → Deduct days_requested from leave balance → Update leave_balance.remaining</li>
                        <li>Pay Pulse Sync → If leave type = LOP → flag for deduction → If paid leave → no deduction</li>
                    </ol>
                </div>
            </div>
            <!-- When Employee Revisits -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0"><i class="ri ri-refresh-line me-1"></i> When employee revisits Time Away:</h6>
                </div>
                <div class="card-body">
                    <ol>
                        <li>Leave balance auto-refreshed</li>
                        <li>Deducted days shown</li>
                        <li>Only remaining quota shown in dropdown</li>
                    </ol>
                </div>
            </div>
            <!-- Actions -->
            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-outline-secondary">
                    <i class="ri ri-close-line"></i> Cancel
                </button>
                <button class="btn btn-primary">
                    <i class="ri ri-send-plane-2-line"></i> Submit Button - Sends to the respective project HR Member
                </button>
            </div>
        </form> --}}

        <!-- Leave History -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-light">
                <h6 class="mb-0"><i class="ri ri-history-line me-1"></i> Leave History</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Leave Type</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Casual Leave</td>
                            <td>2025-12-10</td>
                            <td>2025-12-12</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td><button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLeaveModal">View Details</button></td>
                        </tr>
                        <tr>
                            <td>Sick Leave</td>
                            <td>2025-11-15</td>
                            <td>2025-11-16</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td><button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLeaveModal">View Details</button></td>
                        </tr>
                        <tr>
                            <td>Earned Leave</td>
                            <td>2025-10-20</td>
                            <td>2025-10-25</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td><button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLeaveModal">View Details</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- View Leave Details Modal -->
        <div class="modal fade" id="viewLeaveModal" tabindex="-1" aria-labelledby="viewLeaveModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="viewLeaveModalLabel"><i class="ri ri-eye-line me-1"></i> Leave Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Leave Type</label>
                                <input type="text" class="form-control" value="Casual Leave" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">From Date</label>
                                <input type="date" class="form-control" value="2025-12-10" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">To Date</label>
                                <input type="date" class="form-control" value="2025-12-12" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Reason</label>
                                <textarea class="form-control" rows="3" readonly>Family emergency</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" value="Approved" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Applied On</label>
                                <input type="date" class="form-control" value="2025-12-09" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> Close
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyLeaveModal">
                            <i class="ri ri-add-line"></i> Submit Absence Application
                        </button>
                    </div>
                </div>
            </div>
        </div>

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
                                    <label class="form-label">Leave Type (Drop Down)</label>
                                    <select class="form-select">
                                        <option>Select Leave Type</option>
                                        <option>Casual Leave</option>
                                        <option>Sick Leave</option>
                                        <option>Earned Leave</option>
                                        <option>LOP</option>
                                        <option>Comp Off</option>
                                        <option>Maternity</option>
                                        <option>Paternity</option>
                                        <option>Occasional</option>
                                    </select>
                                    <small class="text-muted">Shows whatever HR Saved as absence type in "Leave Track"</small>
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
                                    <label class="form-label">Manager Approval (MANDATE)</label>
                                    <input type="file" class="form-control">
                                    <small class="text-muted">Manager Approval mail to be Uploaded.</small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> Cancel
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            <i class="ri ri-send-plane-2-line"></i> Submit Button - Sends to the respective project HR Member (Demo)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
