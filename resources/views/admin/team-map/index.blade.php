@extends('admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Team Map</h4>
        <p class="text-muted mb-0">
            Assign employees to projects and reporting managers
        </p>
    </div>
</div>

<!-- Assignment Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label">Project</label>
                <select class="form-select">
                    <option>All Projects</option>
                    <option>RYDZAA-OPS-001</option>
                    <option>RYDZAA-TECH-002</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Manager</label>
                <select class="form-select">
                    <option>All Managers</option>
                    <option>Rohit Sharma</option>
                    <option>Anjali Sen</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Team</label>
                <select class="form-select">
                    <option>All</option>
                    <option>Ops</option>
                    <option>Tech</option>
                    <option>Support</option>
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-outline-primary w-100">
                    <i class="ri ri-filter-3-line"></i> Filter
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Team Mapping Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Project Code</th>
                        <th>Reporting Manager</th>
                        <th>Team</th>
                        <th>Start Date</th>
                        <th>Career Start</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>EMP-001</td>
                        <td>Amit Das</td>
                        <td>Tech</td>
                        <td>RYDZAA-TECH-002</td>
                        <td>Rohit Sharma</td>
                        <td>Tech</td>
                        <td>01 Aug 2025</td>
                        <td>15 Jul 2025</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                Edit
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>EMP-002</td>
                        <td>Neha Verma</td>
                        <td>Operations</td>
                        <td>RYDZAA-OPS-001</td>
                        <td>Anjali Sen</td>
                        <td>Ops</td>
                        <td>10 Aug 2025</td>
                        <td>01 Aug 2025</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                Edit
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Assignment Modal (UI Only) -->
<div class="modal fade" id="assignModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Assign / Update Team Mapping</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Project Code</label>
                        <select class="form-select">
                            <option>Select</option>
                            <option>RYDZAA-OPS-001</option>
                            <option>RYDZAA-TECH-002</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Reporting Manager</label>
                        <select class="form-select">
                            <option>Select</option>
                            <option>Rohit Sharma</option>
                            <option>Anjali Sen</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Team Name</label>
                        <select class="form-select">
                            <option>Ops</option>
                            <option>Tech</option>
                            <option>Support</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Assignment Start Date</label>
                        <input type="date" class="form-control">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button class="btn btn-primary">
                    Save Assignment
                </button>
            </div>

        </div>
    </div>
</div>

@endsection
