@extends('admin.layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1">Job Applicants</h4>
                <p class="text-muted mb-0">
                    Backend Developer (JOB-001)
                </p>
            </div>
            <a href="{{URL::to('/admin/talent-hub')}}" class="btn btn-outline-secondary">
                <i class="ri ri-arrow-left-line"></i> Back to Job Listings
            </a>
        </div>

        <!-- Applicant Summary -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow border-0 gradient-card bg-gradient-primary text-white">
                    <div class="card-body">
                        <h6>Total Applications</h6>
                        <h3 class="fw-bold mb-0">12</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 gradient-card bg-gradient-info text-white">
                    <div class="card-body">
                        <h6>Shortlisted</h6>
                        <h3 class="fw-bold mb-0">5</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 gradient-card bg-gradient-success text-white">
                    <div class="card-body">
                        <h6>Selected</h6>
                        <h3 class="fw-bold mb-0">2</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 gradient-card bg-gradient-danger text-white">
                    <div class="card-body">
                        <h6>Rejected</h6>
                        <h3 class="fw-bold mb-0">3</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <form class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>All</option>
                            <option>Applied</option>
                            <option>Shortlisted</option>
                            <option>Selected</option>
                            <option>Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Experience</label>
                        <select class="form-select">
                            <option>All</option>
                            <option>Fresher</option>
                            <option>Experienced</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Search Name</label>
                        <input type="text" class="form-control" placeholder="Enter name...">
                    </div>
                    <div class="col-md-3 d-grid">
                        <button class="btn btn-primary">
                            <i class="ri ri-filter-3-line"></i> Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Applicants Table -->
        <div class="card border-0 shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Candidate ID</th>
                                <th>Name</th>
                                <th>Experience</th>
                                <th>Resume</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CAND-001</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle me-2" width="36" height="36" alt="Rahul Sharma">
                                        <span>Rahul Sharma</span>
                                    </div>
                                </td>
                                <td>Experienced</td>
                                <td>
                                    <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#cvModal1">
                                        <i class="ri ri-file-text-line"></i> View CV
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">Applied</span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-success">Shortlist</button>
                                    <button class="btn btn-sm btn-outline-danger">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <td>CAND-002</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle me-2" width="36" height="36" alt="Neha Verma">
                                        <span>Neha Verma</span>
                                    </div>
                                </td>
                                <td>Experienced</td>
                                <td>
                                    <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#cvModal2">
                                        <i class="ri ri-file-text-line"></i> View CV
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-info">Shortlisted</span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary">Select</button>
                                    <button class="btn btn-sm btn-outline-danger">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <td>CAND-003</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-2" width="36" height="36" alt="Amit Das">
                                        <span>Amit Das</span>
                                    </div>
                                </td>
                                <td>Fresher</td>
                                <td>
                                    <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#cvModal3">
                                        <i class="ri ri-file-text-line"></i> View CV
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-success">Selected</span>
                                </td>
                                <td class="text-end">
                                    <a href="/admin/hire-desk" class="btn btn-sm btn-outline-primary">Move to Hire Desk</a>
                                </td>
                            </tr>
                            <tr>
                                <td>CAND-004</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://randomuser.me/api/portraits/women/55.jpg" class="rounded-circle me-2" width="36" height="36" alt="Pooja Singh">
                                        <span>Pooja Singh</span>
                                    </div>
                                </td>
                                <td>Experienced</td>
                                <td>
                                    <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#cvModal4">
                                        <i class="ri ri-file-text-line"></i> View CV
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Rejected</span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary" disabled>Rejected</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- CV Modals -->
        <div class="modal fade" id="cvModal1" tabindex="-1" aria-labelledby="cvModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cvModalLabel1">Rahul Sharma - Resume</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" width="100%" height="500px" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cvModal2" tabindex="-1" aria-labelledby="cvModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cvModalLabel2">Neha Verma - Resume</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" width="100%" height="500px" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cvModal3" tabindex="-1" aria-labelledby="cvModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cvModalLabel3">Amit Das - Resume</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" width="100%" height="500px" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cvModal4" tabindex="-1" aria-labelledby="cvModalLabel4" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cvModalLabel4">Pooja Singh - Resume</h5>
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
