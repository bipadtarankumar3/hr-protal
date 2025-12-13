@extends('admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Talent Vault</h4>
        <p class="text-muted mb-0">
            Employee master records & verification status
        </p>
    </div>
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
                <label class="form-label">Verification Status</label>
                <select class="form-select">
                    <option>All</option>
                    <option>Clear</option>
                    <option>Flagged</option>
                    <option>Pending</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Employee Status</label>
                <select class="form-select">
                    <option>Active</option>
                    <option>Inactive</option>
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

<!-- Employee Records Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Project Code</th>
                        <th>Verification</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>EMP-001</td>
                        <td>Amit Das</td>
                        <td>Tech</td>
                        <td>Backend Developer</td>
                        <td>RYDZAA-TECH-002</td>
                        <td>
                            <span class="badge bg-success">Clear</span>
                        </td>
                        <td>
                            <span class="badge bg-primary">Active</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                View
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>EMP-002</td>
                        <td>Neha Verma</td>
                        <td>Operations</td>
                        <td>Ops Executive</td>
                        <td>RYDZAA-OPS-001</td>
                        <td>
                            <span class="badge bg-warning">Pending</span>
                        </td>
                        <td>
                            <span class="badge bg-primary">Active</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                View
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>EMP-003</td>
                        <td>Rohit Sharma</td>
                        <td>Tech</td>
                        <td>Project Manager</td>
                        <td>RYDZAA-TECH-002</td>
                        <td>
                            <span class="badge bg-danger">Flagged</span>
                        </td>
                        <td>
                            <span class="badge bg-secondary">Inactive</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary">
                                View
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Notes -->
<div class="alert alert-info mt-4">
    <i class="ri ri-information-line"></i>
    Talent Vault records are used for payroll, audits, and legal compliance.
    Deactivated employees cannot be reactivated.
</div>

@endsection
