@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-group-line me-2 text-primary"></i>Team Map</h4>
                <p class="text-muted mb-0">Assign employees to projects and reporting managers</p>
            </div>
            <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#assignModal">
                <i class="ri ri-user-add-line me-1"></i> New Assignment
            </button>
        </div>
        <!-- Assignment Filters -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <form class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label"><i class="ri ri-folder-3-line me-1"></i>Project</label>
                        <select class="form-select">
                            <option>All Projects</option>
                            <option>RYDZAA-OPS-001</option>
                            <option>RYDZAA-TECH-002</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><i class="ri ri-user-star-line me-1"></i>Manager</label>
                        <select class="form-select">
                            <option>All Managers</option>
                            <option>Rohit Sharma</option>
                            <option>Anjali Sen</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><i class="ri ri-team-line me-1"></i>Team</label>
                        <select class="form-select">
                            <option>All</option>
                            <option>Ops</option>
                            <option>Tech</option>
                            <option>Support</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-grid">
                        <button class="btn btn-outline-primary">
                            <i class="ri ri-filter-3-line"></i> Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Team Mapping Table -->
        <div class="card border-0 shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th><i class="ri ri-id-card-line"></i> Employee ID</th>
                                <th><i class="ri ri-user-3-line"></i> Name</th>
                                <th><i class="ri ri-building-4-line"></i> Department</th>
                                <th><i class="ri ri-folder-3-line"></i> Project Code</th>
                                <th><i class="ri ri-user-star-line"></i> Manager</th>
                                <th><i class="ri ri-team-line"></i> Team</th>
                                <th><i class="ri ri-calendar-event-line"></i> Start Date</th>
                                <th><i class="ri ri-calendar-check-line"></i> Career Start</th>
                                <th class="text-end"><i class="ri ri-settings-3-line"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>EMP-001</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-2" width="36" height="36" alt="Amit Das">
                                        <span>Amit Das</span>
                                    </div>
                                </td>
                                <td>Tech</td>
                                <td>RYDZAA-TECH-002</td>
                                <td>Rohit Sharma</td>
                                <td>Tech</td>
                                <td>01 Aug 2025</td>
                                <td>15 Jul 2025</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#assignModal">
                                        <i class="ri ri-edit-2-line"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>EMP-002</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle me-2" width="36" height="36" alt="Neha Verma">
                                        <span>Neha Verma</span>
                                    </div>
                                </td>
                                <td>Operations</td>
                                <td>RYDZAA-OPS-001</td>
                                <td>Anjali Sen</td>
                                <td>Ops</td>
                                <td>10 Aug 2025</td>
                                <td>01 Aug 2025</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#assignModal">
                                        <i class="ri ri-edit-2-line"></i> Edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Assignment Modal (UI Only) -->
        <div class="modal fade" id="assignModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="ri ri-user-add-line me-1"></i> Assign / Update Team Mapping</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Project Code</label>
                                <select class="form-select">
                                    <option>Select</option>
                                    <option>RYDZAA-OPS-001</option>
                                    <option>RYDZAA-TECH-002</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Reporting Manager</label>
                                <select class="form-select">
                                    <option>Select</option>
                                    <option>Rohit Sharma</option>
                                    <option>Anjali Sen</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Team Name</label>
                                <select class="form-select">
                                    <option>Ops</option>
                                    <option>Tech</option>
                                    <option>Support</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Assignment Start Date</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> Cancel
                        </button>
                        <button class="btn btn-primary">
                            <i class="ri ri-save-3-line"></i> Save Assignment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
