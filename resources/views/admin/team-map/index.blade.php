@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1"><i class="ri ri-group-line me-2 text-primary"></i>Team Map</h4>
            <p class="text-muted mb-0">Manage team structure and assignments</p>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal" onclick="loadCreateForm()">
            <i class="ri ri-user-add-line me-1"></i> Create Team Map
        </button>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ri-check-line me-2"></i>{{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filter Section -->
    <div class="card mb-4 bg-light">
        <div class="card-body">
            <form method="GET" action="{{ route('team-maps.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Search <small class="text-muted">(Team Name, Focus Area)</small></label>
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Department</label>
                    <select name="department_id" class="form-select">
                        <option value="">All Departments</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="">All</option>
                        <option value="true" {{ request('is_active') === 'true' ? 'selected' : '' }}>Active</option>
                        <option value="false" {{ request('is_active') === 'false' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="ri ri-filter-3-line"></i> Apply Filters
                    </button>
                    <a href="{{ route('team-maps.index') }}" class="btn btn-outline-secondary">
                        <i class="ri ri-refresh-line"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Team Mapping Table -->
    <div class="card border-0 shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Team Name</th>
                            <th>Department</th>
                            <th>Team Lead</th>
                            <th>Members</th>
                            <th>Focus Area</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($team_maps as $map)
                        <tr>
                            <td><strong>{{ $map->team_name }}</strong></td>
                            <td>
                                @if($map->department)
                                    <span class="badge bg-info">{{ $map->department->name }}</span>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($map->teamLead)
                                    {{ $map->teamLead->name }}
                                @else
                                    <span class="text-muted">Unassigned</span>
                                @endif
                            </td>
                            <td><span class="badge bg-primary">{{ $map->member_count }}</span></td>
                            <td>{{ $map->focus_area ?? 'N/A' }}</td>
                            <td>
                                @if($map->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $map->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadViewData({{ $map->id }})" title="View">
                                    <i class="ri-eye-line"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="loadEditForm({{ $map->id }})" title="Edit">
                                    <i class="ri-edit-line"></i>
                                </button>
                                <form action="{{ route('team-maps.destroy', $map->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this team map?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="ri-inbox-2-line ri-3x mb-2 d-block"></i>
                                No team mappings found. <a href="#" data-bs-toggle="modal" data-bs-target="#createModal" onclick="loadCreateForm()">Create one</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if($team_maps->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $team_maps->links() }}
        </div>
    @endif

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ri-user-add-line me-2"></i>Create Team Map</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="createModalBody">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitCreateForm()">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel"><i class="ri-edit-line me-2"></i>Edit Team Map</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editModalBody">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitEditForm()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel"><i class="ri-eye-line me-2"></i>View Team Map</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewModalBody">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Load create form
    function loadCreateForm() {
        document.getElementById('createModalBody').innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
        
        fetch('{{ route("team-maps.create") }}', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('createModalBody').innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('createModalBody').innerHTML = '<div class="alert alert-danger">Error loading form</div>';
        });
    }

    // Load edit form
    function loadEditForm(id) {
        document.getElementById('editModalBody').innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
        
        fetch(`{{ url('admin/team-map') }}/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('editModalBody').innerHTML = html;
            // Set form action
            const form = document.getElementById('editForm');
            if (form) {
                form.action = `{{ url('admin/team-map') }}/${id}`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('editModalBody').innerHTML = '<div class="alert alert-danger">Error loading form</div>';
        });
    }

    // Load view data
    function loadViewData(id) {
        document.getElementById('viewModalBody').innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
        
        fetch(`{{ url('admin/team-map') }}/${id}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('viewModalBody').innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('viewModalBody').innerHTML = '<div class="alert alert-danger">Error loading data</div>';
        });
    }

    // Submit create form
    function submitCreateForm() {
        const form = document.getElementById('createForm');
        if (!form) {
            alert('Form not found');
            return;
        }

        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                // Show validation errors
                if (data.errors) {
                    let errorMsg = 'Validation errors:\n';
                    for (let field in data.errors) {
                        errorMsg += data.errors[field][0] + '\n';
                    }
                    alert(errorMsg);
                } else {
                    alert('Error: ' + (data.message || 'Failed to create'));
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error creating team map');
        });
    }

    // Submit edit form
    function submitEditForm() {
        const form = document.getElementById('editForm');
        if (!form) {
            alert('Form not found');
            return;
        }

        const formData = new FormData(form);
        formData.append('_method', 'PUT');
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                // Show validation errors
                if (data.errors) {
                    let errorMsg = 'Validation errors:\n';
                    for (let field in data.errors) {
                        errorMsg += data.errors[field][0] + '\n';
                    }
                    alert(errorMsg);
                } else {
                    alert('Error: ' + (data.message || 'Failed to update'));
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating team map');
        });
    }
</script>
@endpush
@endsection
