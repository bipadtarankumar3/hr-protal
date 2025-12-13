@extends('admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Buzz Desk</h4>
        <p class="text-muted mb-0">
            Company announcements, holidays & updates
        </p>
    </div>
    <button class="btn btn-primary">
        <i class="ri ri-add-line"></i> Publish Announcement
    </button>
</div>

<!-- Tabs -->
<ul class="nav nav-pills mb-4">
    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#announcements">
            Announcements
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#holidays">
            Holidays
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#payslips">
            Payslips
        </button>
    </li>
</ul>

<div class="tab-content">

    <!-- Announcements -->
    <div class="tab-pane fade show active" id="announcements">
        <div class="row g-3">

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="fw-semibold mb-1">
                                    New Attendance Policy
                                </h6>
                                <small class="text-muted">
                                    HR • 05 May 2025
                                </small>
                            </div>
                            <span class="badge bg-info">Mandate</span>
                        </div>
                        <p class="mt-3 mb-0">
                            From May 6th, attendance must be submitted before
                            10 AM the following working day.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="fw-semibold mb-1">
                                    Diwali Holiday Announced
                                </h6>
                                <small class="text-muted">
                                    HR • 01 Oct 2025
                                </small>
                            </div>
                            <span class="badge bg-success">Holiday</span>
                        </div>
                        <p class="mt-3 mb-0">
                            Office will remain closed on 20th October
                            on account of Diwali.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Holidays -->
    <div class="tab-pane fade" id="holidays">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Upcoming Holidays</h6>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Holiday</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>15 Aug 2025</td>
                            <td>Independence Day</td>
                            <td>
                                <span class="badge bg-primary">National</span>
                            </td>
                        </tr>

                        <tr>
                            <td>28 Aug 2025</td>
                            <td>Ganesh Chaturthi</td>
                            <td>
                                <span class="badge bg-warning">Regional</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Payslips -->
    <div class="tab-pane fade" id="payslips">
        <div class="card">
            <div class="card-body">
                <div class="row g-3 align-items-end">

                    <div class="col-md-4">
                        <label class="form-label">Year</label>
                        <select class="form-select">
                            <option>2025</option>
                            <option>2024</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Month</label>
                        <select class="form-select">
                            <option>September</option>
                            <option>August</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-primary w-100">
                            Download Payslip
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
