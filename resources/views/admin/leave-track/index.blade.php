@extends('admin.layouts.app')

@section('content')


 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Leave Track</h4>
        <p class="text-muted mb-0">
            Configure leave types, quotas & holidays
        </p>
    </div>
</div>

<!-- Tabs -->
<ul class="nav nav-pills mb-4">
    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#leaveTypes">
            Leave Configuration
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nationalHolidays">
            National Holidays
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#regionalHolidays">
            Regional Holidays
        </button>
    </li>
</ul>

<div class="tab-content">

    <!-- Leave Configuration -->
    <div class="tab-pane fade show active" id="leaveTypes">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Leave Types & Quotas</h6>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Leave Type</th>
                            <th>Quota</th>
                            <th>Carry Forward</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Casual Leave</td>
                            <td>
                                <input type="number" class="form-control" value="6">
                            </td>
                            <td>
                                <select class="form-select">
                                    <option>Yes</option>
                                    <option selected>No</option>
                                </select>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>

                        <tr>
                            <td>Sick Leave</td>
                            <td>
                                <input type="number" class="form-control" value="6">
                            </td>
                            <td>
                                <select class="form-select">
                                    <option>Yes</option>
                                    <option selected>No</option>
                                </select>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>

                        <tr>
                            <td>Earned Leave</td>
                            <td>
                                <input type="number" class="form-control" value="12">
                            </td>
                            <td>
                                <select class="form-select">
                                    <option selected>Yes</option>
                                    <option>No</option>
                                </select>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>

                        <tr>
                            <td>LOP</td>
                            <td>
                                <input type="number" class="form-control" value="0" disabled>
                            </td>
                            <td>
                                <span class="text-muted">N/A</span>
                            </td>
                            <td>
                                <span class="badge bg-warning">Unpaid</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="card-footer text-end">
                <button class="btn btn-primary">
                    Save Configuration
                </button>
            </div>
        </div>
    </div>

    <!-- National Holidays -->
    <div class="tab-pane fade" id="nationalHolidays">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">National Holidays</h6>
            </div>
            <div class="card-body">

                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control"
                               placeholder="Holiday Name (e.g. Independence Day)">
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" value="2025">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-primary w-100">
                            Add
                        </button>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Holiday</th>
                            <th>Year</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15 Aug</td>
                            <td>Independence Day</td>
                            <td>2025</td>
                            <td>
                                <span class="badge bg-success">Published</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Regional Holidays -->
    <div class="tab-pane fade" id="regionalHolidays">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Regional Holidays</h6>
            </div>
            <div class="card-body">

                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <select class="form-select">
                            <option>State</option>
                            <option>MH</option>
                            <option>WB</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="date" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control"
                               placeholder="Holiday Name (e.g. Ganesh Chaturthi)">
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-outline-primary w-100">
                            Add
                        </button>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>State</th>
                            <th>Date</th>
                            <th>Holiday</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MH</td>
                            <td>28 Aug</td>
                            <td>Ganesh Chaturthi</td>
                            <td>2025</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
</div>
</div>

@endsection
