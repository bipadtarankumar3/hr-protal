@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">OffBoard Desk</h4>
        <p class="text-muted mb-0">
            Manage resignations, clearances & final settlements
        </p>
    </div>
</div>

<!-- Resignation Queue Filters -->
<div class="card mb-4">
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
                    <i class="ri ri-filter-3-line"></i> Apply Filters
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Resignation Queue -->
<div class="card mb-4">
    <div class="card-header">
        <h6 class="mb-0">Resignation Queue</h6>
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
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <strong>Amit Das</strong><br>
                            <small class="text-muted">EMP-001</small>
                        </td>
                        <td>Tech</td>
                        <td>30 Sep 2025</td>
                        <td>
                            <span class="badge bg-warning">Pending Approval</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                View Details
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Exit Checklist -->
<div class="card">
    <div class="card-header">
        <h6 class="mb-0">Exit Checklist</h6>
    </div>
    <div class="card-body">

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <strong>Employee:</strong> Amit Das (EMP-001)
            </div>
            <div class="col-md-6">
                <strong>Last Working Day:</strong> 30 Sep 2025
            </div>
        </div>

        <ul class="list-group">

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Manager Clearance
                <span class="badge bg-warning">Pending</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                HR Clearance
                <span class="badge bg-secondary">Pending</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Finance Clearance
                <span class="badge bg-secondary">Pending</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Final Settlement Date
                <input type="date" class="form-control w-25">
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Last Month Salary Release Date
                <input type="date" class="form-control w-25">
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Relieving Letter
                <span class="badge bg-secondary">Not Issued</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Experience Letter
                <span class="badge bg-secondary">Not Issued</span>
            </li>

        </ul>

        <div class="d-flex justify-content-end mt-4 gap-2">
            <button class="btn btn-outline-secondary">
                Save Progress
            </button>
            <button class="btn btn-success">
                Complete Exit
            </button>
        </div>

    </div>
</div>
</div>
</div>

@endsection
