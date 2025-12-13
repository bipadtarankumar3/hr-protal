@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Time Away</h4>
        <p class="text-muted mb-0">
            Apply for leave or record past absences
        </p>
    </div>
</div>

<!-- Leave Balance Summary -->
<div class="row g-3 mb-4">

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Casual Leave</h6>
                <h4 class="fw-semibold mb-0">4</h4>
                <small class="text-muted">Remaining</small>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Sick Leave</h6>
                <h4 class="fw-semibold mb-0">6</h4>
                <small class="text-muted">Remaining</small>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Earned Leave</h6>
                <h4 class="fw-semibold mb-0">10</h4>
                <small class="text-muted">Remaining</small>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>LOP</h6>
                <h4 class="fw-semibold mb-0">—</h4>
                <small class="text-muted">Unpaid</small>
            </div>
        </div>
    </div>

</div>

<!-- Absence Application Form -->
<form>

    <div class="card mb-4">
        <div class="card-header">
            <h6 class="mb-0">Apply for Absence</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Leave Type</label>
                    <select class="form-select">
                        <option>Select Leave Type</option>
                        <option>Casual Leave</option>
                        <option>Sick Leave</option>
                        <option>Earned Leave</option>
                        <option>LOP</option>
                        <option>Comp Off</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">From Date</label>
                    <input type="date" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">To Date</label>
                    <input type="date" class="form-control">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Reason (Optional)</label>
                    <textarea class="form-control" rows="3"
                        placeholder="Reason for absence..."></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Manager Approval (Mandatory)
                    </label>
                    <input type="file" class="form-control">
                    <small class="text-muted">
                        Upload email or written approval from reporting manager
                    </small>
                </div>

            </div>
        </div>
    </div>

    <!-- Important Note -->
    <div class="alert alert-warning">
        <i class="ri ri-alert-line"></i>
        Leave can be applied after absence. Attendance for missed days will
        be auto-adjusted after approval.
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-end gap-2">
        <button class="btn btn-outline-secondary">
            Cancel
        </button>
        <button class="btn btn-primary">
            Submit Absence
        </button>
    </div>

</form>

              </div>
              </div>

@endsection
