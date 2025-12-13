@extends('admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Role Master</h4>
        <p class="text-muted mb-0">
            Define organization roles & reporting hierarchy
        </p>
    </div>
    <button class="btn btn-primary">
        <i class="ri ri-add-line"></i> Create Role
    </button>
</div>

<!-- Roles Table -->
<div class="card mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Role Title</th>
                        <th>Level</th>
                        <th>Department</th>
                        <th>Reports To</th>
                        <th>Flags</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Chief Technology Officer</td>
                        <td>CXO</td>
                        <td>Tech</td>
                        <td>Board</td>
                        <td>
                            <span class="badge bg-danger">CXO</span>
                        </td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                Edit
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Senior Backend Developer</td>
                        <td>Senior</td>
                        <td>Tech</td>
                        <td>Engineering Manager</td>
                        <td>
                            —
                        </td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                Edit
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>HR Executive</td>
                        <td>Associate</td>
                        <td>HR</td>
                        <td>HR Manager</td>
                        <td>
                            —
                        </td>
                        <td>
                            <span class="badge bg-secondary">Inactive</span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                Locked
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Org Chart Configuration -->
<div class="card">
    <div class="card-header">
        <h6 class="mb-0">Org Chart UI Configuration</h6>
    </div>
    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-4">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" placeholder="Tech">
            </div>

            <div class="col-md-4">
                <label class="form-label">Display Order</label>
                <input type="number" class="form-control" placeholder="1">
            </div>

            <div class="col-md-4">
                <label class="form-label">Color Code</label>
                <input type="color" class="form-control form-control-color">
            </div>

        </div>

        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-success">
                Save Configuration
            </button>
        </div>

    </div>
</div>

@endsection
