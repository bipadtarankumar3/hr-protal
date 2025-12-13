@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Hire Desk</h4>
        <p class="text-muted mb-0">
            Shortlisted candidates & offer management
        </p>
    </div>
</div>

<!-- Pipeline Summary -->
<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Selected</h6>
                <h4 class="fw-semibold mb-0">3</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Offer Sent</h6>
                <h4 class="fw-semibold mb-0">2</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Offer Accepted</h6>
                <h4 class="fw-semibold mb-0">1</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Offer Declined</h6>
                <h4 class="fw-semibold mb-0">1</h4>
            </div>
        </div>
    </div>

</div>

<!-- Candidate Pipeline Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Candidate ID</th>
                        <th>Name</th>
                        <th>Job Title</th>
                        <th>CTC</th>
                        <th>Joining Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Selected -->
                    <tr>
                        <td>CAND-003</td>
                        <td>Amit Das</td>
                        <td>Backend Developer</td>
                        <td>—</td>
                        <td>—</td>
                        <td>
                            <span class="badge bg-info">Selected</span>
                        </td>
                        <td class="text-end">
                            <a href="{{URL::to('/admin/hire-desk/offer')}}" class="btn btn-sm btn-outline-primary">
                                Generate Offer
                            </a>
                        </td>
                    </tr>

                    <!-- Offer Sent -->
                    <tr>
                        <td>CAND-005</td>
                        <td>Riya Sen</td>
                        <td>HR Executive</td>
                        <td>₹4,20,000</td>
                        <td>01 Sep 2025</td>
                        <td>
                            <span class="badge bg-warning">Offer Sent</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary">
                                View Offer
                            </button>
                        </td>
                    </tr>

                    <!-- Accepted -->
                    <tr>
                        <td>CAND-006</td>
                        <td>Arjun Mehta</td>
                        <td>Finance Analyst</td>
                        <td>₹6,50,000</td>
                        <td>15 Sep 2025</td>
                        <td>
                            <span class="badge bg-success">Offer Accepted</span>
                        </td>
                        <td class="text-end">
                            <a href="/admin/onboard-pro" class="btn btn-sm btn-outline-success">
                                Start Onboarding
                            </a>
                        </td>
                    </tr>

                    <!-- Declined -->
                    <tr>
                        <td>CAND-007</td>
                        <td>Pankaj Roy</td>
                        <td>Support Executive</td>
                        <td>₹3,00,000</td>
                        <td>—</td>
                        <td>
                            <span class="badge bg-danger">Offer Declined</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                Closed
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

@endsection
