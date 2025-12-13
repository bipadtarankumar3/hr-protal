@extends('admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Dashboard</h4>
        <p class="text-muted mb-0">HRMS overview & quick insights</p>
    </div>
</div>

<!-- KPI Cards -->
<div class="row g-3 mb-4">

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="avatar bg-label-primary me-3">
                    <i class="ri ri-group-line ri-22px"></i>
                </div>
                <div>
                    <h6 class="mb-0">Total Employees</h6>
                    <h4 class="fw-semibold mb-0">128</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="avatar bg-label-success me-3">
                    <i class="ri ri-briefcase-line ri-22px"></i>
                </div>
                <div>
                    <h6 class="mb-0">Open Jobs</h6>
                    <h4 class="fw-semibold mb-0">7</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="avatar bg-label-warning me-3">
                    <i class="ri ri-calendar-check-line ri-22px"></i>
                </div>
                <div>
                    <h6 class="mb-0">Pending Leaves</h6>
                    <h4 class="fw-semibold mb-0">5</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="avatar bg-label-danger me-3">
                    <i class="ri ri-logout-box-line ri-22px"></i>
                </div>
                <div>
                    <h6 class="mb-0">Active Resignations</h6>
                    <h4 class="fw-semibold mb-0">2</h4>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Dashboard Sections -->
<div class="row g-4">

    <!-- Recruitment Overview -->
    <div class="col-xl-6">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="mb-0">Recruitment Overview</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Job Title</th>
                            <th>Department</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Backend Developer</td>
                            <td>Tech</td>
                            <td><span class="badge bg-success">Published</span></td>
                        </tr>
                        <tr>
                            <td>HR Executive</td>
                            <td>Operations</td>
                            <td><span class="badge bg-warning">Draft</span></td>
                        </tr>
                    </tbody>
                </table>
                <a href="/admin/talent-hub" class="btn btn-sm btn-outline-primary mt-2">
                    View Talent Hub
                </a>
            </div>
        </div>
    </div>

    <!-- Attendance & Payroll -->
    <div class="col-xl-6">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="mb-0">Attendance & Payroll</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Payroll Month</span>
                        <span class="fw-semibold">August 2025</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Payroll Status</span>
                        <span class="badge bg-success">On Track</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Attendance Cut-off</span>
                        <span class="fw-semibold">25th</span>
                    </li>
                </ul>
                <a href="/admin/pay-pulse" class="btn btn-sm btn-outline-primary mt-3">
                    Go to Pay Pulse
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
