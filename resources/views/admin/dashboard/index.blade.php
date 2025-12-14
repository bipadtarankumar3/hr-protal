@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">HRMS Dashboard</h4>
            <p class="text-muted mb-0">Organization-wide overview & operational insights</p>
        </div>
    </div>

    <!-- KPI ROW -->
    <div class="row g-3 mb-4">

        <!-- Total Employees -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar bg-label-primary me-3">
                        <i class="ri ri-group-line ri-22px"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Total Employees</h6>
                        <h4 class="fw-semibold mb-0">128</h4>
                        <small class="text-muted">Talent Vault</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Open Jobs -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar bg-label-success me-3">
                        <i class="ri ri-briefcase-line ri-22px"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Open Jobs</h6>
                        <h4 class="fw-semibold mb-0">7</h4>
                        <small class="text-muted">Talent Hub</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Pending -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar bg-label-warning me-3">
                        <i class="ri ri-time-line ri-22px"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Attendance Pending</h6>
                        <h4 class="fw-semibold mb-0">12</h4>
                        <small class="text-muted">Pulse Log (This Week)</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Resignations -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar bg-label-danger me-3">
                        <i class="ri ri-logout-box-line ri-22px"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Active Resignations</h6>
                        <h4 class="fw-semibold mb-0">2</h4>
                        <small class="text-muted">Curtain Call</small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4">

        <!-- Recruitment Pipeline -->
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="mb-0">Recruitment Pipeline</h6>
                    <a href="/admin/talent-hub" class="btn btn-sm btn-outline-primary">View</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Job</th>
                                <th>Dept</th>
                                <th>Status</th>
                                <th>Applicants</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Backend Developer</td>
                                <td>Tech</td>
                                <td><span class="badge bg-success">Published</span></td>
                                <td>34 / 50</td>
                            </tr>
                            <tr>
                                <td>HR Executive</td>
                                <td>Ops</td>
                                <td><span class="badge bg-warning">Draft</span></td>
                                <td>—</td>
                            </tr>
                        </tbody>
                    </table>
                    <small class="text-muted">
                        Auto exhausts when application limit is reached
                    </small>
                </div>
            </div>
        </div>

        <!-- Payroll & Attendance Status -->
        {{-- <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="mb-0">Payroll & Attendance Status</h6>
                    <a href="/admin/pay-pulse" class="btn btn-sm btn-outline-primary">Pay Pulse</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Payroll Month</span>
                            <span class="fw-semibold">August 2025</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Attendance Cut-off</span>
                            <span class="fw-semibold">25th</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Payroll Status</span>
                            <span class="badge bg-success">Ready</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>LOP Impacted Employees</span>
                            <span class="fw-semibold text-danger">3</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div> --}}

        <!-- Leave & Absence -->
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="mb-0">Leave & Absence Overview</h6>
                    <a href="/admin/leave-track" class="btn btn-sm btn-outline-primary">Leave Track</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Pending Leave Approvals</span>
                            <span class="fw-semibold">5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Employees on Leave Today</span>
                            <span class="fw-semibold">9</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Comp-Off Requests</span>
                            <span class="fw-semibold">2</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Project & Compliance -->
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="mb-0">Projects & Compliance</h6>
                    <a href="/admin/project-desk" class="btn btn-sm btn-outline-primary">Project Desk</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Active Projects</span>
                            <span class="fw-semibold">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Projects Not Synced</span>
                            <span class="fw-semibold text-warning">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Audit Exports (This Month)</span>
                            <span class="fw-semibold">6</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
