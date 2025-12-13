@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Onboard Pro</h4>
        <p class="text-muted mb-0">
            Candidate onboarding & KYC verification
        </p>
    </div>
</div>

<!-- Candidate Info -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <strong>Candidate Name</strong>
                <div>Amit Das</div>
            </div>
            <div class="col-md-3">
                <strong>Candidate ID</strong>
                <div>CAND-003</div>
            </div>
            <div class="col-md-3">
                <strong>Job Role</strong>
                <div>Backend Developer</div>
            </div>
            <div class="col-md-3">
                <strong>KYC Status</strong>
                <div>
                    <span class="badge bg-warning">Draft</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stepper Navigation -->
<ul class="nav nav-pills mb-4" role="tablist">
    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#personal">
            1. Personal Info
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#bank">
            2. Bank Details
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#documents">
            3. Documents & KYC
        </button>
    </li>
</ul>

<!-- Stepper Content -->
<div class="tab-content">

    <!-- Step 1: Personal Info -->
    <div class="tab-pane fade show active" id="personal">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Personal Information</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" value="Amit Das">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="amit@example.com">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" placeholder="10-digit mobile">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Emergency Contact</label>
                        <input type="text" class="form-control">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Step 2: Bank Details -->
    <div class="tab-pane fade" id="bank">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Bank Details</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Bank Name</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Account Number</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">IFSC Code</label>
                        <input type="text" class="form-control">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Step 3: Documents & KYC -->
    <div class="tab-pane fade" id="documents">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Documents & KYC</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">PAN Card</label>
                        <input type="file" class="form-control">
                        <small class="text-muted">Third-party verification</small>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Aadhaar</label>
                        <input type="file" class="form-control">
                        <small class="text-muted">Third-party verification</small>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Education Certificates</label>
                        <input type="file" class="form-control">
                        <small class="text-muted">Third-party verification</small>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Experience Letters</label>
                        <input type="file" class="form-control">
                        <small class="text-muted">Third-party verification</small>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Bank Proof</label>
                        <input type="file" class="form-control">
                        <small class="text-muted">Finance verification</small>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Photo & Signature</label>
                        <input type="file" class="form-control">
                        <small class="text-muted">HR verification</small>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- Actions -->
<div class="d-flex justify-content-end gap-2">
    <button class="btn btn-outline-secondary">
        Save Draft
    </button>
    <button class="btn btn-primary">
        Submit for Verification
    </button>
</div>
</div>
</div>

@endsection
