@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1"><i class="ri ri-stack-line me-2"></i>Teams</h4>
      <p class="text-muted">Manage all teams in your organization</p>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTeamModal">
      <i class="ri-add-line me-1"></i>Create Team
    </button>
  </div>

  <!-- Filter Section -->
  <div class="card mb-4 bg-light">
    <div class="card-body">
      <form method="GET" action="{{ route('teams.index') }}" class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Search <small class="text-muted">(Name, Description)</small></label>
          <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select">
            <option value="">All</option>
            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
          </select>
        </div>
        <div class="col-md-3 d-flex align-items-end gap-2">
          <button type="submit" class="btn btn-primary w-100">
            <i class="ri-filter-3-line"></i> Apply Filters
          </button>
          <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary">
            <i class="ri-refresh-line"></i> Reset
          </a>
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Team Name</th>
              <th>Description</th>
              <th>Manager</th>
              <th>Status</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($teams as $team)
            <tr>
              <td><strong>{{ $team->name }}</strong></td>
              <td>{{ Str::limit($team->description ?? 'N/A', 40) }}</td>
              <td>{{ $team->manager->name ?? 'Unassigned' }}</td>
              <td>
                <span class="badge bg-{{ ['active' => 'success', 'inactive' => 'secondary', 'pending' => 'warning'][$team->status] ?? 'secondary' }}">
                  {{ ucfirst($team->status ?? 'N/A') }}
                </span>
              </td>
              <td class="text-end">
                <button type="button" 
                        class="btn btn-sm btn-info" 
                        title="View"
                        data-modal-id="viewTeamModal"
                        data-modal-url="{{ route('teams.show', $team->id) }}"
                        data-modal-title="View Team">
                  <i class="ri-eye-line"></i>
                </button>
                <button type="button" 
                        class="btn btn-sm btn-primary" 
                        title="Edit"
                        data-modal-id="editTeamModal"
                        data-modal-url="{{ route('teams.edit', $team->id) }}"
                        data-modal-title="Edit Team">
                  <i class="ri-edit-line"></i>
                </button>
                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this team?');">
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
              <td colspan="5" class="text-center py-4 text-muted">No teams found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $teams->links() }}
  </div>

  <!-- Create Team Modal -->
  @component('admin.components.modal', [
      'id' => 'createTeamModal',
      'title' => 'Create Team',
      'icon' => 'ri ri-add-line',
      'size' => 'lg',
      'formAction' => route('teams.store'),
      'formMethod' => 'POST',
      'submitText' => 'Create'
  ])
      @php
          $departments = \App\Models\Department::all();
          $users = \App\Models\User::all();
      @endphp
      
      @component('admin.components.modal-form-field', [
          'name' => 'name',
          'label' => 'Team Name',
          'type' => 'text',
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
          'name' => 'manager_id',
          'label' => 'Manager',
          'type' => 'select',
          'options' => $users->pluck('name', 'id')->toArray()
      ])
      @endcomponent
      
      @component('admin.components.modal-form-field', [
          'name' => 'department_id',
          'label' => 'Department',
          'type' => 'select',
          'options' => $departments->pluck('name', 'id')->toArray()
      ])
      @endcomponent
      
      @component('admin.components.modal-form-field', [
          'name' => 'status',
          'label' => 'Status',
          'type' => 'select',
          'options' => ['active' => 'Active', 'inactive' => 'Inactive', 'pending' => 'Pending'],
          'required' => true
      ])
      @endcomponent
  @endcomponent

  <!-- Edit Team Modal -->
  @component('admin.components.modal', [
      'id' => 'editTeamModal',
      'title' => 'Edit Team',
      'icon' => 'ri ri-edit-line',
      'size' => 'lg',
      'formAction' => route('teams.update', ':id'),
      'formMethod' => 'PUT',
      'submitText' => 'Update'
  ])
      @php
          $departments = \App\Models\Department::all();
          $users = \App\Models\User::all();
      @endphp
      
      @component('admin.components.modal-form-field', [
          'name' => 'name',
          'label' => 'Team Name',
          'type' => 'text',
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
          'name' => 'manager_id',
          'label' => 'Manager',
          'type' => 'select',
          'options' => $users->pluck('name', 'id')->toArray()
      ])
      @endcomponent
      
      @component('admin.components.modal-form-field', [
          'name' => 'department_id',
          'label' => 'Department',
          'type' => 'select',
          'options' => $departments->pluck('name', 'id')->toArray()
      ])
      @endcomponent
      
      @component('admin.components.modal-form-field', [
          'name' => 'status',
          'label' => 'Status',
          'type' => 'select',
          'options' => ['active' => 'Active', 'inactive' => 'Inactive', 'pending' => 'Pending'],
          'required' => true
      ])
      @endcomponent
  @endcomponent

  <!-- View Team Modal -->
  @component('admin.components.modal', [
      'id' => 'viewTeamModal',
      'title' => 'View Team',
      'icon' => 'ri ri-eye-line',
      'size' => 'lg',
      'submitButton' => false,
      'cancelText' => 'Close'
  ])
      <div id="viewTeamContent">
        <div class="text-center py-4">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
  @endcomponent

  @push('scripts')
  <script>
      // Handle edit modal form action update
      document.querySelectorAll('[data-modal-id="editTeamModal"]').forEach(btn => {
          btn.addEventListener('click', function() {
              const url = this.getAttribute('data-modal-url');
              const id = url.match(/\/(\d+)\//)?.[1];
              if (id) {
                  const form = document.querySelector('#editTeamModal form');
                  if (form) {
                      form.action = form.action.replace(':id', id);
                  }
              }
          });
      });
  </script>
  @endpush
</div>
@endsection
