@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-projector-line me-2 text-primary"></i>Project Desk</h4>
                <p class="text-muted mb-0">Manage project codes for attendance, payroll, and team mapping</p>
            </div>
        </div>

        <!-- Sync Logic -->
        <div class="alert alert-info mb-4">
            <h6><i class="ri ri-sync-line me-1"></i>Sync Logic:</h6>
            <ul class="mb-0">
                <li><strong>Pulse Log</strong> - Uses project code for attendance tagging</li>
                <li><strong>Pay Pulse</strong> - Uses project code for payroll mapping</li>
                <li><strong>Team Map</strong> - Uses project code for access control and manager mapping</li>
            </ul>
        </div>

        <!-- HR Panel Content -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h6 class="mb-0"><i class="ri ri-settings-3-line me-1"></i>Project Code Management</h6>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProjectModal">
                <i class="ri ri-add-line"></i> Add Project
            </button>
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
                        <label class="form-label">Project Manager</label>
                        <select class="form-select">
                            <option>All</option>
                            <option>Rohit Sharma</option>
                            <option>Anjali Sen</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>All</option>
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

        <!-- Project List -->
        <div class="card">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Project Codes List</h6>
                <button class="btn btn-success btn-sm">
                    <i class="ri ri-download-line"></i> Export Registry
                </button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="projectsTable">
                        <thead class="table-light">
                            <tr>
                                <th>Project Code</th>
                                <th>Project Name</th>
                                <th>Department</th>
                                <th>Team Code</th>
                                <th>Project Manager</th>
                                <th>Status</th>
                                <th>Sync Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>RYDZAA-TECH-002</td>
                                <td>Core Platform</td>
                                <td>Tech</td>
                                <td>TECH</td>
                                <td>Rohit Sharma</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td><span class="badge bg-info">Payroll & Attendance</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary edit-btn" data-id="1">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger delete-btn" data-id="1">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>RYDZAA-OPS-001</td>
                                <td>Operations Support</td>
                                <td>Operations</td>
                                <td>OPS</td>
                                <td>Anjali Sen</td>
                                <td><span class="badge bg-secondary">Inactive</span></td>
                                <td><span class="badge bg-warning">Not Synced</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary edit-btn" data-id="2">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger delete-btn" data-id="2">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Access Control -->
        <div class="alert alert-secondary mt-4">
            <h6><i class="ri ri-shield-user-line me-1"></i>Access Control:</h6>
            <ul class="mb-0">
                <li><strong>HR</strong> - Full (Create/ Edit/ Delete)</li>
                <li><strong>Finance HR</strong> - Read Only: View, Filter, Export</li>
                <li><strong>Project Manager</strong> - No Access (View via Team Map)</li>
            </ul>
        </div>

        <!-- Auditor View Note -->
        <div class="alert alert-info">
            <strong>Note:</strong> Finance HR (Auditor View) for detailed employee mapping and attendance summaries is available in the <strong>Team Map</strong> page.
        </div>
    </div>
</div>



<!-- Create Project Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form method="POST" action="">
                @csrf

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="createProjectModalLabel">
                        <i class="ri ri-add-box-line me-1 text-primary"></i>
                        Add New Project
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Project Code -->
                        <div class="col-md-6">
                            <label class="form-label">Project Code <span class="text-danger">*</span></label>
                            <input type="text" name="project_code" class="form-control" placeholder="RYDZAA-TECH-003" required>
                        </div>

                        <!-- Project Name -->
                        <div class="col-md-6">
                            <label class="form-label">Project Name <span class="text-danger">*</span></label>
                            <input type="text" name="project_name" class="form-control" placeholder="Project Name" required>
                        </div>

                        <!-- Department -->
                        <div class="col-md-4">
                            <label class="form-label">Department <span class="text-danger">*</span></label>
                            <select name="department" class="form-select" required>
                                <option value="">Select</option>
                                <option value="Tech">Tech</option>
                                <option value="Operations">Operations</option>
                                <option value="Support">Support</option>
                            </select>
                        </div>

                        <!-- Team Code -->
                        <div class="col-md-4">
                            <label class="form-label">Team Code <span class="text-danger">*</span></label>
                            <input type="text" name="team_code" class="form-control" placeholder="TECH / OPS" required>
                        </div>

                        <!-- Project Manager -->
                        <div class="col-md-4">
                            <label class="form-label">Project Manager</label>
                            <select name="project_manager_id" class="form-select">
                                <option value="">Select Manager</option>
                                {{-- Loop managers --}}
                                {{-- @foreach($managers as $manager) --}}
                                {{-- <option value="{{ $manager->id }}">{{ $manager->name }}</option> --}}
                                {{-- @endforeach --}}
                            </select>
                        </div>

                        <!-- Sync Options -->
                        <div class="col-md-12">
                            <label class="form-label">Sync Modules</label>
                            <div class="d-flex gap-4 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sync_attendance" value="1" checked>
                                    <label class="form-check-label">Pulse Log (Attendance)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sync_payroll" value="1">
                                    <label class="form-check-label">Pay Pulse (Payroll)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sync_team_map" value="1">
                                    <label class="form-check-label">Team Map</label>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Notes -->
                        <div class="col-md-6">
                            <label class="form-label">Remarks (Optional)</label>
                            <input type="text" name="remarks" class="form-control" placeholder="Internal notes">
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ri ri-save-line me-1"></i> Save Project
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

