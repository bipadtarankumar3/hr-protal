@extends('admin.layouts.app')

@section('content')

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
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Applications</h6>
                <h4 class="fw-semibold mb-0">12</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Shortlisted</h6>
                <h4 class="fw-semibold mb-0">5</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Selected</h6>
                <h4 class="fw-semibold mb-0">2</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Rejected</h6>
                <h4 class="fw-semibold mb-0">3</h4>
            </div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
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

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-outline-primary w-100">
                    <i class="ri ri-filter-3-line"></i> Apply Filters
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Applicants Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
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
                        <td>Rahul Sharma</td>
                        <td>Experienced</td>
                        <td>
                            <a href="#" class="text-primary">
                                <i class="ri ri-file-text-line"></i> View CV
                            </a>
                        </td>
                        <td>
                            <span class="badge bg-secondary">Applied</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-success">
                                Shortlist
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                Reject
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>CAND-002</td>
                        <td>Neha Verma</td>
                        <td>Experienced</td>
                        <td>
                            <a href="#" class="text-primary">
                                <i class="ri ri-file-text-line"></i> View CV
                            </a>
                        </td>
                        <td>
                            <span class="badge bg-info">Shortlisted</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                Select
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                Reject
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>CAND-003</td>
                        <td>Amit Das</td>
                        <td>Fresher</td>
                        <td>
                            <a href="#" class="text-primary">
                                <i class="ri ri-file-text-line"></i> View CV
                            </a>
                        </td>
                        <td>
                            <span class="badge bg-success">Selected</span>
                        </td>
                        <td class="text-end">
                            <a href="/admin/hire-desk" class="btn btn-sm btn-outline-primary">
                                Move to Hire Desk
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>CAND-004</td>
                        <td>Pooja Singh</td>
                        <td>Experienced</td>
                        <td>
                            <a href="#" class="text-primary">
                                <i class="ri ri-file-text-line"></i> View CV
                            </a>
                        </td>
                        <td>
                            <span class="badge bg-danger">Rejected</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                Rejected
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
