@extends('admin.layouts.app')

@section('content')


 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Offer Letter</h4>
        <p class="text-muted mb-0">
            Generate & manage offer for selected candidate
        </p>
    </div>
    <a href="{{URL::to('/admin/hire-desk')}}" class="btn btn-outline-secondary">
        <i class="ri ri-arrow-left-line"></i> Back to Hire Desk
    </a>
</div>

<!-- Candidate Summary -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <strong>Candidate Name:</strong>
                <div>Amit Das</div>
            </div>
            <div class="col-md-4">
                <strong>Candidate ID:</strong>
                <div>CAND-003</div>
            </div>
            <div class="col-md-4">
                <strong>Job Title:</strong>
                <div>Backend Developer</div>
            </div>
        </div>
    </div>
</div>

<form>

    <!-- Offer Details -->
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="mb-0">Offer Details</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Role / Designation</label>
                    <input type="text" class="form-control" value="Backend Developer">
                </div>

                <div class="col-md-3">
                    <label class="form-label">CTC (Annual)</label>
                    <input type="text" class="form-control" placeholder="₹ 6,00,000">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Joining Date</label>
                    <input type="date" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Offer Status</label>
                    <select class="form-select">
                        <option>Draft</option>
                        <option>Offer Sent</option>
                        <option>Accepted</option>
                        <option>Declined</option>
                        <option>No Response</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Triggered By</label>
                    <input type="text" class="form-control" value="HR Admin" disabled>
                </div>

            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-between align-items-center">

        <div>
            <button type="button" class="btn btn-outline-secondary">
                <i class="ri ri-file-pdf-line"></i> Preview Offer PDF
            </button>
        </div>

        <div class="d-flex gap-2">
            <button type="button" class="btn btn-outline-secondary">
                Save Draft
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="ri ri-send-plane-line"></i> Send Offer Letter
            </button>
        </div>

    </div>

</form>
              </div>
              </div>

@endsection
