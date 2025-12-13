@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Project Desk</h4>
        <p class="text-muted mb-0">
            Create, manage and audit project codes
        </p>
    </div>
    <button class="btn btn-primary">
        <i class="ri ri-add-line"></i> Create Project
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
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
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
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                            <span class="badge bg-info">Payroll & Attendance</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                Disable
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>RYDZAA-OPS-001</td>
                        <td>Operations Support</td>
                        <td>Operations</td>
                        <td>OPS</td>
                        <td>Anjali Sen</td>
                        <td>
                            <span class="badge bg-secondary">Inactive</span>
                        </td>
                        <td>
                            <span class="badge bg-warning">Not Synced</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                Locked
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Audit Note -->
<div class="alert alert-info mt-4">
    <i class="ri ri-information-line"></i>
    Project codes are used across Pulse Log, Pay Pulse, and Team Map.
    Disabling a project immediately blocks future usage.
</div>
</div>
</div>

@endsection
