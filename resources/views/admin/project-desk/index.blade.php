@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-projector-line me-2 text-primary"></i>Project Desk</h4>
                <p class="text-muted mb-0">Manage project codes for attendance, payroll, and team mapping</p>
            </div>
            <a href="#" data-bs-toggle="modal" data-bs-target="#createProjectModal" class="btn btn-primary">
                <i class="ri-add-line me-1"></i>Add Project
            </a>
        </div>

        <!-- Filters -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('project-desks.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by project name or description" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-outline-primary w-100">
                            <i class="ri ri-filter-3-line"></i> Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Project List -->
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h6 class="mb-0">Project Codes List</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Project Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($project_desks as $project)
                                <tr>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ Str::limit($project->description, 50) }}</td>
                                    <td>
                                        @if($project->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $project->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('project-desks.show', $project->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <a href="{{ route('project-desks.edit', $project->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="ri-inbox-line me-2"></i>No projects found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $project_desks->links() }}
        </div>
    



<!-- Create Project Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form method="POST" action="">
                @csrf

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="createProjectModalLabel">
                        <i class="ri ri-add-box-line me-1 text-primary"></i>
                        Add New Project
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Project Code -->
                        <div class="col-md-6">
                            <label class="form-label">Project Code <span class="text-danger">*</span></label>
                            <input type="text" name="project_code" class="form-control" placeholder="RYDZAA-TECH-003" required>
                        </div>

                        <!-- Project Name -->
                        <div class="col-md-6">
                            <label class="form-label">Project Name <span class="text-danger">*</span></label>
                            <input type="text" name="project_name" class="form-control" placeholder="Project Name" required>
                        </div>

                        <!-- Department -->
                        <div class="col-md-4">
                            <label class="form-label">Department <span class="text-danger">*</span></label>
                            <select name="department" class="form-select" required>
                                <option value="">Select</option>
                                <option value="Tech">Tech</option>
                                <option value="Operations">Operations</option>
                                <option value="Support">Support</option>
                            </select>
                        </div>

                        <!-- Team Code -->
                        <div class="col-md-4">
                            <label class="form-label">Team Code <span class="text-danger">*</span></label>
                            <input type="text" name="team_code" class="form-control" placeholder="TECH / OPS" required>
                        </div>

                        <!-- Project Manager -->
                        <div class="col-md-4">
                            <label class="form-label">Project Manager</label>
                            <select name="project_manager_id" class="form-select">
                                <option value="">Select Manager</option>
                                {{-- Loop managers --}}
                                {{-- @foreach($managers as $manager) --}}
                                {{-- <option value="{{ $manager->id }}">{{ $manager->name }}</option> --}}
                                {{-- @endforeach --}}
                            </select>
                        </div>

                        <!-- Sync Options -->
                        <div class="col-md-12">
                            <label class="form-label">Sync Modules</label>
                            <div class="d-flex gap-4 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sync_attendance" value="1" checked>
                                    <label class="form-check-label">Pulse Log (Attendance)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sync_payroll" value="1">
                                    <label class="form-check-label">Pay Pulse (Payroll)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sync_team_map" value="1">
                                    <label class="form-check-label">Team Map</label>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Notes -->
                        <div class="col-md-6">
                            <label class="form-label">Remarks (Optional)</label>
                            <input type="text" name="remarks" class="form-control" placeholder="Internal notes">
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ri ri-save-line me-1"></i> Save Project
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

