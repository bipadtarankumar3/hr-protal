@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Pulse Log</h4>
        <p class="text-muted mb-0">
            Weekly attendance & time logging
        </p>
    </div>
</div>

<!-- Week Selector -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3 align-items-end">

            <div class="col-md-3">
                <label class="form-label">Week</label>
                <select class="form-select">
                    <option>Current Week (01 Sep – 07 Sep)</option>
                    <option>Previous Week (25 Aug – 31 Aug)</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Project Code</label>
                <select class="form-select">
                    <option>RYDZAA-TECH-002</option>
                    <option>RYDZAA-OPS-001</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Entry Type</label>
                <select class="form-select">
                    <option>Manual</option>
                    <option>Auto (Leave/Holiday)</option>
                </select>
            </div>

            <div class="col-md-3">
                <button class="btn btn-outline-primary w-100">
                    Load Attendance
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Attendance Grid -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered mb-0 text-center align-middle">

                <thead class="table-light">
                    <tr>
                        <th>Day</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                        <th>Sun</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- Hours Row -->
                    <tr>
                        <td class="fw-semibold">Hours</td>
                        <td><input type="number" class="form-control text-center" value="8.00"></td>
                        <td><input type="number" class="form-control text-center" value="8.00"></td>
                        <td><input type="number" class="form-control text-center" value="8.00"></td>
                        <td><input type="number" class="form-control text-center" value="8.00"></td>
                        <td><input type="number" class="form-control text-center" value="8.00"></td>
                        <td><input type="number" class="form-control text-center" value="0.00"></td>
                        <td><input type="number" class="form-control text-center" value="0.00"></td>
                    </tr>

                    <!-- Status Row -->
                    <tr>
                        <td class="fw-semibold">Status</td>
                        <td><span class="badge bg-success">Present</span></td>
                        <td><span class="badge bg-success">Present</span></td>
                        <td><span class="badge bg-success">Present</span></td>
                        <td><span class="badge bg-warning">Holiday</span></td>
                        <td><span class="badge bg-info">Leave</span></td>
                        <td><span class="badge bg-secondary">Weekend</span></td>
                        <td><span class="badge bg-secondary">Weekend</span></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- Attendance Notes -->
<div class="card mt-4">
    <div class="card-body">
        <label class="form-label">Notes (Optional)</label>
        <textarea class="form-control" rows="3"
            placeholder="Any remarks for this week..."></textarea>
    </div>
</div>

<!-- Actions -->
<div class="d-flex justify-content-end mt-3 gap-2">
    <button class="btn btn-outline-secondary">
        Save Draft
    </button>
    <button class="btn btn-primary">
        Submit Attendance
    </button>
</div>
</div>
</div>

@endsection
