@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-folder-user-line me-2 text-primary"></i>Talent Vault</h4>
                <p class="text-muted mb-0">HR repository for employee master data & verification</p>
            </div>
            <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                <i class="ri ri-add-line me-1"></i> Add Employee
            </button>
        </div>

        <!-- Purpose -->
        <div class="alert alert-info mb-4">
            <h6><i class="ri ri-information-line me-1"></i>Purpose:</h6>
            <ul class="mb-0">
                <li>Acts as the HR repository for all employee master data.</li>
                <li>Stores third party verification result</li>
                <li>Syncs with other portals (Eg - Leave Track, Pay Pulse) but operates independently.</li>
                <li>Used by HR, Legal, and Finance for compliance and audit trails</li>
            </ul>
        </div>

        <!-- Filters -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Department</label>
                        <select class="form-select">
                            <option>All</option>
                            <option>Tech</option>
                            <option>Operations</option>
                            <option>Support</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Verification Status</label>
                        <select class="form-select">
                            <option>All</option>
                            <option>Clear</option>
                            <option>Flagged</option>
                            <option>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Employee Status</label>
                        <select class="form-select">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-outline-primary w-100">
                            <i class="ri ri-filter-3-line"></i> Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Records Table -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Project Code</th>
                                <th>Verification</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>EMP-001</td>
                                <td>Amit Das</td>
                                <td>Tech</td>
                                <td>Backend Developer</td>
                                <td>RYDZAA-TECH-002</td>
                                <td>
                                    <span class="badge bg-success">Clear</span>
                                </td>
                                <td>
                                    <span class="badge bg-primary">Active</span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">
                                        View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>EMP-002</td>
                                <td>Neha Verma</td>
                                <td>Operations</td>
                                <td>Ops Executive</td>
                                <td>RYDZAA-OPS-001</td>
                                <td>
                                    <span class="badge bg-warning">Pending</span>
                                </td>
                                <td>
                                    <span class="badge bg-primary">Active</span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">
                                        View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>EMP-003</td>
                                <td>Rohit Sharma</td>
                                <td>Tech</td>
                                <td>Project Manager</td>
                                <td>RYDZAA-TECH-002</td>
                                <td>
                                    <span class="badge bg-danger">Flagged</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">Inactive</span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">
                                        View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Access Control -->
        <div class="alert alert-warning mt-4">
            <h6><i class="ri ri-shield-user-line me-1"></i>Access Control:</h6>
            <ul class="mb-0">
                <li><strong>HR</strong> - Full access: create, edit, upload</li>
                <li><strong>Legal</strong> - Read Only: View flagged cases</li>
                <li><strong>Finance HR</strong> - Read Only: View verified status before payroll</li>
                <li><strong>Manager</strong> - No access (view via Onboard Pro Only)</li>
            </ul>
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
