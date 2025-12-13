@extends('admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Learn Zone</h4>
        <p class="text-muted mb-0">
            Internal policies, SOPs & training resources
        </p>
    </div>
    <button class="btn btn-primary">
        <i class="ri ri-upload-line"></i> Upload Document
    </button>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">

            <div class="col-md-4">
                <label class="form-label">Category</label>
                <select class="form-select">
                    <option>All</option>
                    <option>Policy</option>
                    <option>SOP</option>
                    <option>Training</option>
                    <option>Compliance</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Department</label>
                <select class="form-select">
                    <option>All</option>
                    <option>HR</option>
                    <option>Tech</option>
                    <option>Operations</option>
                </select>
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-outline-primary w-100">
                    <i class="ri ri-search-line"></i> Search
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Knowledge Cards -->
<div class="row g-3">

    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <span class="badge bg-primary mb-2">Policy</span>
                <h6 class="fw-semibold">Employee Code of Conduct</h6>
                <p class="text-muted small">
                    Guidelines on professional behavior and ethics.
                </p>
            </div>
            <div class="card-footer bg-transparent">
                <a href="#" class="btn btn-sm btn-outline-primary w-100">
                    View Document
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <span class="badge bg-success mb-2">SOP</span>
                <h6 class="fw-semibold">Leave Application SOP</h6>
                <p class="text-muted small">
                    Step-by-step guide for applying and approving leaves.
                </p>
            </div>
            <div class="card-footer bg-transparent">
                <a href="#" class="btn btn-sm btn-outline-primary w-100">
                    View Document
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <span class="badge bg-warning mb-2">Training</span>
                <h6 class="fw-semibold">Information Security Awareness</h6>
                <p class="text-muted small">
                    Mandatory security training for all employees.
                </p>
            </div>
            <div class="card-footer bg-transparent">
                <a href="#" class="btn btn-sm btn-outline-primary w-100">
                    Start Training
                </a>
            </div>
        </div>
    </div>

</div>

<!-- Notes -->
<div class="alert alert-info mt-4">
    <i class="ri ri-information-line"></i>
    Learn Zone materials are version-controlled and accessible
    based on department and role.
</div>

@endsection
