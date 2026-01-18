@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1"><i class="ri ri-group-line me-2 text-primary"></i>Team Map</h4>
            <p class="text-muted mb-0">Assign employees to projects and reporting managers</p>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTeamMapModal">
            <i class="ri ri-user-add-line me-1"></i> New Assignment
        </button>
    </div>

    <!-- Filter Section -->
    <div class="card mb-4 bg-light">
        <div class="card-body">
            <form method="GET" action="{{ route('team-maps.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Search <small class="text-muted">(Project, Team, Name)</small></label>
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                            <th><i class="ri ri-id-card-line"></i> ID</th>
                            <th><i class="ri ri-team-line"></i> Team Name</th>
                            <th><i class="ri ri-building-line"></i> Department</th>
                            <th><i class="ri ri-user-star-line"></i> Team Lead</th>
                            <th><i class="ri ri-group-line"></i> Members</th>
                            <th><i class="ri ri-calendar-event-line"></i> Created</th>
                            <th class="text-end"><i class="ri ri-settings-3-line"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($team_maps as $map)
                        <tr>
                            <td>{{ $map->id }}</td>
                            <td>{{ $map->team_name ?? 'N/A' }}</td>
                            <td><span class="badge bg-info">{{ $map->department->name ?? 'N/A' }}</span></td>
                            <td>{{ $map->teamLead->name ?? 'Unassigned' }}</td>
                            <td>{{ $map->member_count ?? 0 }}</td>
                            <td>{{ $map->created_at ? $map->created_at->format('d M Y') : 'N/A' }}</td>
                            <td class="text-end">
                                <button type="button" 
                                        class="btn btn-sm btn-outline-primary" 
                                        title="View"
                                        data-modal-id="viewTeamMapModal"
                                        data-modal-url="{{ route('team-maps.show', $map->id) }}"
                                        data-modal-title="View Team Map">
                                    <i class="ri-eye-line"></i>
                                </button>
                                <button type="button" 
                                        class="btn btn-sm btn-outline-secondary" 
                                        title="Edit"
                                        data-modal-id="editTeamMapModal"
                                        data-modal-url="{{ route('team-maps.edit', $map->id) }}"
                                        data-modal-title="Edit Team Map">
                                    <i class="ri-edit-line"></i>
                                </button>
                                <form action="{{ route('team-maps.destroy', $map->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this team map?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No team mappings found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $team_maps->links() }}
    </div>
</div>
@endsection
        <!-- Create Team Map Modal -->
        @component('admin.components.modal', [
            'id' => 'createTeamMapModal',
            'title' => 'Create Team Map',
            'icon' => 'ri ri-user-add-line',
            'size' => 'lg',
            'formAction' => route('team-maps.store'),
            'formMethod' => 'POST',
            'submitText' => 'Create'
        ])
            @php
                $departments = \App\Models\Department::all();
                $users = \App\Models\User::all();
            @endphp
            
            @component('admin.components.modal-form-field', [
                'name' => 'team_name',
                'label' => 'Team Name',
                'type' => 'text',
                'required' => true
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'department_id',
                'label' => 'Department',
                'type' => 'select',
                'options' => $departments->pluck('name', 'id')->toArray(),
                'required' => true
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'team_lead_id',
                'label' => 'Team Lead',
                'type' => 'select',
                'options' => $users->pluck('name', 'id')->toArray(),
                'required' => true
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'member_count',
                'label' => 'Member Count',
                'type' => 'number',
                'value' => 1,
                'required' => true
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'description',
                'label' => 'Description',
                'type' => 'textarea',
                'rows' => 3
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'focus_area',
                'label' => 'Focus Area',
                'type' => 'text'
            ])
            @endcomponent
        @endcomponent

        <!-- View Team Map Modal -->
        @component('admin.components.modal', [
            'id' => 'viewTeamMapModal',
            'title' => 'View Team Map',
            'icon' => 'ri ri-eye-line',
            'size' => 'lg',
            'submitButton' => false,
            'cancelText' => 'Close'
        ])
            <div id="viewTeamMapContent">
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        @endcomponent

        <!-- Edit Team Map Modal -->
        @component('admin.components.modal', [
            'id' => 'editTeamMapModal',
            'title' => 'Edit Team Map',
            'icon' => 'ri ri-edit-line',
            'size' => 'lg',
            'formAction' => route('team-maps.update', ':id'),
            'formMethod' => 'PUT',
            'submitText' => 'Update'
        ])
            @php
                $departments = \App\Models\Department::all();
                $users = \App\Models\User::all();
            @endphp
            
            @component('admin.components.modal-form-field', [
                'name' => 'team_name',
                'label' => 'Team Name',
                'type' => 'text',
                'required' => true
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'department_id',
                'label' => 'Department',
                'type' => 'select',
                'options' => $departments->pluck('name', 'id')->toArray(),
                'required' => true
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'team_lead_id',
                'label' => 'Team Lead',
                'type' => 'select',
                'options' => $users->pluck('name', 'id')->toArray(),
                'required' => true
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'member_count',
                'label' => 'Member Count',
                'type' => 'number',
                'required' => true
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'description',
                'label' => 'Description',
                'type' => 'textarea',
                'rows' => 3
            ])
            @endcomponent
            
            @component('admin.components.modal-form-field', [
                'name' => 'focus_area',
                'label' => 'Focus Area',
                'type' => 'text'
            ])
            @endcomponent
        @endcomponent

        @push('scripts')
        <script>
            // Handle edit modal form action update
            document.querySelectorAll('[data-modal-id="editTeamMapModal"]').forEach(btn => {
                btn.addEventListener('click', function() {
                    const url = this.getAttribute('data-modal-url');
                    const id = url.match(/\/(\d+)\//)?.[1];
                    if (id) {
                        const form = document.querySelector('#editTeamMapModal form');
                        if (form) {
                            form.action = form.action.replace(':id', id);
                        }
                    }
                });
            });
        </script>
        @endpush
    </div>
</div>
@endsection
