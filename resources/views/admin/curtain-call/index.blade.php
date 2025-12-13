@extends('admin.layouts.app')

@section('content')


 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Curtain Call</h4>
        <p class="text-muted mb-0">
            Submit your resignation request
        </p>
    </div>
</div>

<!-- Employee Details (Pre-filled) -->
<div class="card mb-4">
    <div class="card-header">
        <h6 class="mb-0">Employee Details</h6>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <strong>Employee ID</strong>
                <div>EMP-001</div>
            </div>
            <div class="col-md-3">
                <strong>Name</strong>
                <div>Amit Das</div>
            </div>
            <div class="col-md-3">
                <strong>Designation</strong>
                <div>Backend Developer</div>
            </div>
            <div class="col-md-3">
                <strong>Reporting Manager</strong>
                <div>Rohit Sharma</div>
            </div>
        </div>
    </div>
</div>

<!-- Resignation Form -->
<form>

    <div class="card mb-4">
        <div class="card-header">
            <h6 class="mb-0">Resignation Details</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Reason for Resignation</label>
                    <select class="form-select">
                        <option>Select Reason</option>
                        <option>Personal Reasons</option>
                        <option>Career Growth</option>
                        <option>Higher Studies</option>
                        <option>Relocation</option>
                        <option>Health Issues</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Proposed Last Working Day</label>
                    <input type="date" class="form-control">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Comments (Optional)</label>
                    <textarea class="form-control" rows="3"
                        placeholder="You may share additional comments..."></textarea>
                </div>

            </div>
        </div>
    </div>

    <!-- Important Info -->
    <div class="alert alert-warning">
        <i class="ri ri-alert-line"></i>
        Once submitted, your resignation will be reviewed by your
        reporting manager and HR. You will be notified about your
        confirmed Last Working Day.
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-end gap-2">
        <button type="button" class="btn btn-outline-secondary">
            Cancel
        </button>
        <button type="submit" class="btn btn-danger">
            Submit Resignation
        </button>
    </div>

</form>

<!-- Resignation Status Tracker -->
<div class="card mt-5">
    <div class="card-header">
        <h6 class="mb-0">Resignation Status</h6>
    </div>
    <div class="card-body">

        <ul class="list-group list-group-flush">

            <li class="list-group-item d-flex justify-content-between">
                <span>Resignation Submitted</span>
                <span class="badge bg-success">Completed</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
                <span>Manager Approval</span>
                <span class="badge bg-warning">Pending</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
                <span>HR Clearance</span>
                <span class="badge bg-secondary">Pending</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
                <span>Final Settlement</span>
                <span class="badge bg-secondary">Pending</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
                <span>Relieving Letter</span>
                <span class="badge bg-secondary">Pending</span>
            </li>

        </ul>

    </div>
</div>
</div>
</div>

@endsection
