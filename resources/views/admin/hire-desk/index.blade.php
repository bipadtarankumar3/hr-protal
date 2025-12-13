@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1">Hire Desk</h4>
                <p class="text-muted mb-0">Shortlisted candidates & offer management</p>
            </div>
        </div>
        <!-- Pipeline Summary -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow border-0 gradient-card bg-gradient-info text-white">
                    <div class="card-body">
                        <h6>Selected</h6>
                        <h3 class="fw-bold mb-0">3</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 gradient-card bg-gradient-warning text-white">
                    <div class="card-body">
                        <h6>Offer Sent</h6>
                        <h3 class="fw-bold mb-0">2</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 gradient-card bg-gradient-success text-white">
                    <div class="card-body">
                        <h6>Offer Accepted</h6>
                        <h3 class="fw-bold mb-0">1</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 gradient-card bg-gradient-danger text-white">
                    <div class="card-body">
                        <h6>Offer Declined</h6>
                        <h3 class="fw-bold mb-0">1</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Candidate Pipeline Table -->
        <div class="card border-0 shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
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
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-2" width="36" height="36" alt="Amit Das">
                                        <span>Amit Das</span>
                                    </div>
                                </td>
                                <td>Backend Developer</td>
                                <td>—</td>
                                <td>—</td>
                                <td><span class="badge bg-info">Selected</span></td>
                                <td class="text-end">
                                    <a href="{{URL::to('/admin/hire-desk/offer')}}" class="btn btn-sm btn-outline-primary">Generate Offer</a>
                                </td>
                            </tr>
                            <!-- Offer Sent -->
                            <tr>
                                <td>CAND-005</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/women/50.jpg" class="rounded-circle me-2" width="36" height="36" alt="Riya Sen">
                                        <span>Riya Sen</span>
                                    </div>
                                </td>
                                <td>HR Executive</td>
                                <td>₹4,20,000</td>
                                <td>01 Sep 2025</td>
                                <td><span class="badge bg-warning">Offer Sent</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#offerModal1">View Offer</button>
                                </td>
                            </tr>
                            <!-- Accepted -->
                            <tr>
                                <td>CAND-006</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/men/60.jpg" class="rounded-circle me-2" width="36" height="36" alt="Arjun Mehta">
                                        <span>Arjun Mehta</span>
                                    </div>
                                </td>
                                <td>Finance Analyst</td>
                                <td>₹6,50,000</td>
                                <td>15 Sep 2025</td>
                                <td><span class="badge bg-success">Offer Accepted</span></td>
                                <td class="text-end">
                                    <a href="/admin/onboard-pro" class="btn btn-sm btn-outline-success">Start Onboarding</a>
                                </td>
                            </tr>
                            <!-- Declined -->
                            <tr>
                                <td>CAND-007</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/men/70.jpg" class="rounded-circle me-2" width="36" height="36" alt="Pankaj Roy">
                                        <span>Pankaj Roy</span>
                                    </div>
                                </td>
                                <td>Support Executive</td>
                                <td>₹3,00,000</td>
                                <td>—</td>
                                <td><span class="badge bg-danger">Offer Declined</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary" disabled>Closed</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Offer Modal Example -->
        <div class="modal fade" id="offerModal1" tabindex="-1" aria-labelledby="offerModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="offerModalLabel1">Offer Letter - Riya Sen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" width="100%" height="500px" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
