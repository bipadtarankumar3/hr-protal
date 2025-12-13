@extends('admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Talent Hub</h4>
        <p class="text-muted mb-0">Manage job postings & recruitment pipeline</p>
    </div>
    <a href="{{URL::to('/admin/talent-hub/create')}}" class="btn btn-primary">
        <i class="ri ri-add-line"></i> Create Job
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Department</label>
                <select class="form-select">
                    <option>All</option>
                    <option>Tech</option>
                    <option>Operations</option>
                    <option>Support</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Location</label>
                <select class="form-select">
                    <option>All</option>
                    <option>Durgapur</option>
                    <option>Kolkata</option>
                    <option>Remote</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                    <option>All</option>
                    <option>Draft</option>
                    <option>Published</option>
                    <option>Exhausted</option>
                    <option>Closed</option>
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

<!-- Job Listings Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Job ID</th>
                        <th>Job Title</th>
                        <th>Department</th>
                        <th>Location</th>
                        <th>Applications</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>JOB-001</td>
                        <td>Backend Developer</td>
                        <td>Tech</td>
                        <td>Remote</td>
                        <td>12 / 20</td>
                        <td>
                            <span class="badge bg-success">Published</span>
                        </td>
                        <td class="text-end">
                            <a href="/admin/talent-hub/applicants" class="btn btn-sm btn-outline-primary">
                                Applicants
                            </a>
                            <button class="btn btn-sm btn-outline-secondary">
                                Edit
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>JOB-002</td>
                        <td>HR Executive</td>
                        <td>Operations</td>
                        <td>Kolkata</td>
                        <td>5 / 5</td>
                        <td>
                            <span class="badge bg-warning">Exhausted</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary">
                                View
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                Close
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>JOB-003</td>
                        <td>Customer Support Agent</td>
                        <td>Support</td>
                        <td>Durgapur</td>
                        <td>0 / 10</td>
                        <td>
                            <span class="badge bg-secondary">Draft</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                Publish
                            </button>
                            <button class="btn btn-sm btn-outline-secondary">
                                Edit
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>JOB-004</td>
                        <td>Finance Analyst</td>
                        <td>Finance</td>
                        <td>Kolkata</td>
                        <td>—</td>
                        <td>
                            <span class="badge bg-danger">Closed</span>
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

@endsection
