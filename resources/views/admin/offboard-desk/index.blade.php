@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 20px; border-radius: 10px; color: white;">
            <div>
                <h4 class="fw-semibold mb-1">OffBoard Desk</h4>
                <p class="text-muted mb-0" style="color: rgba(255,255,255,0.8);">
                    Manage resignations, clearances & final settlements
                </p>
            </div>
        </div>

<!-- Resignation Queue Filters -->
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-filter-3-line me-2"></i>Filters</h6>
    </div>
    <div class="card-body">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label">Project</label>
                <select class="form-select">
                    <option>All</option>
                    <option>RYDZAA-TECH-002</option>
                    <option>RYDZAA-OPS-001</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Department</label>
                <select class="form-select">
                    <option>All</option>
                    <option>Tech</option>
                    <option>Operations</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Completed</option>
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-outline-primary w-100">
                    <i class="ri ri-filter-3-line me-1"></i> Apply Filters
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Resignation Queue -->
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-list-check me-2"></i>Resignation Queue</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Proposed LWD</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                                <div>
                                    <strong>Amit Das</strong><br>
                                    <small class="text-muted">EMP-001</small>
                                </div>
                            </div>
                        </td>
                        <td>Tech</td>
                        <td>30 Sep 2025</td>
                        <td>
                            <span class="badge bg-warning">Pending Approval</span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approveModal">
                                    <i class="ri-check-line"></i> Approve
                                </button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                    <i class="ri-close-line"></i> Reject
                                </button>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailsModal">
                                    <i class="ri-eye-line"></i> View Details
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Exit Checklist Panel -->
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-clipboard-check-line me-2"></i>Exit Checklist</h6>
    </div>
    <div class="card-body">

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <strong>Employee:</strong> Amit Das (EMP-001)
            </div>
            <div class="col-md-6">
                <strong>Last Working Day:</strong> 30 Sep 2025
            </div>
        </div>

        <div class="accordion" id="exitChecklistAccordion">
            <!-- Manager Clearance -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. Manager Clearance
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="managerClearance">
                            <label class="form-check-label" for="managerClearance">
                                Verified by [Project Manager]
                            </label>
                        </div>
                        <textarea class="form-control" rows="2" placeholder="Add comments..."></textarea>
                    </div>
                </div>
            </div>

            <!-- HR Clearance -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. HR Clearance
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="hrClearance">
                            <label class="form-check-label" for="hrClearance">
                                Verified by [HR Manager]
                            </label>
                        </div>
                        <textarea class="form-control" rows="2" placeholder="Add comments..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Finance Clearance -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Finance Clearance
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="financeClearance">
                            <label class="form-check-label" for="financeClearance">
                                Verified by [Finance HR]
                            </label>
                        </div>
                        <textarea class="form-control" rows="2" placeholder="Add comments..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Final Settlement Date -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        4. Final Settlement Date
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <input type="date" class="form-control mb-3">
                        <small class="text-muted">Verified by [Finance HR]</small>
                    </div>
                </div>
            </div>

            <!-- Last Month Salary Release Date -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        5. Last Month Salary Release Date
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <input type="date" class="form-control mb-3">
                        <small class="text-muted">Verified by [Finance HR]</small>
                    </div>
                </div>
            </div>

            <!-- Relieving Letter Status -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        6. Relieving Letter Status
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <select class="form-select mb-3">
                            <option>Not Issued</option>
                            <option>Issued</option>
                        </select>
                        <small class="text-muted">Verified by [HR Manager]</small>
                    </div>
                </div>
            </div>

            <!-- Experience Letter Status -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        7. Experience Letter Status
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <select class="form-select mb-3">
                            <option>Not Issued</option>
                            <option>Issued</option>
                        </select>
                        <small class="text-muted">Verified by [HR Manager]</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4 gap-2">
            <button class="btn btn-outline-secondary">
                <i class="ri-save-line me-1"></i>Save Progress
            </button>
            <button class="btn btn-success">
                <i class="ri-check-double-line me-1"></i>Complete Exit
            </button>
        </div>

    </div>
</div>
</div>
</div>

<!-- Notifications -->
<div class="card shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-notification-line me-2"></i>Notifications</h6>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <strong>Resignation Submitted:</strong> Trigger (Employee) → Recipient (HR + Manager)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-success">
                    <strong>LWD Confirmed:</strong> Trigger (HR) → Recipient (Employee)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-warning">
                    <strong>Final Settlement Scheduled:</strong> Trigger (Finance HR) → Recipient (HR)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-primary">
                    <strong>Pay Slip (Final):</strong> Trigger (Finance HR) → Recipient (HR)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-secondary">
                    <strong>Relieving Letter:</strong> Trigger (Finance HR) → Recipient (HR)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-dark">
                    <strong>Experience Letter:</strong> Trigger (Finance HR) → Recipient (HR)
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
