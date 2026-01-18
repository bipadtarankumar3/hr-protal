@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0"><i class="ri-shield-check-line me-2"></i>Manage Permissions - {{ $role_master->name }}</h4>
        <a href="{{ route('role-masters.index') }}" class="btn btn-secondary">
          <i class="ri-arrow-left-line me-1"></i>Back to Roles
        </a>
      </div>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Validation Errors:</strong>
          <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="alert alert-info mb-4">
        <i class="ri-information-line me-2"></i>
        <strong>Instructions:</strong> Select the permissions for each module. Check the boxes to grant permissions for Create, Read, Update, Delete, and Extra operations.
      </div>

      <form method="POST" action="{{ route('role-masters.permissions.update', $role_master->id) }}" id="permissionsForm">
        @csrf
        
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th width="25%">Module</th>
                <th class="text-center">Create</th>
                <th class="text-center">Read</th>
                <th class="text-center">Update</th>
                <th class="text-center">Delete</th>
                <th class="text-center">Extra</th>
                <th class="text-center" width="15%">Quick Actions</th>
              </tr>
              <tr class="bg-light">
                <th></th>
                <th class="text-center">
                  <button type="button" class="btn btn-sm btn-outline-primary" onclick="selectAll('create')">
                    <i class="ri-checkbox-multiple-line"></i> All
                  </button>
                </th>
                <th class="text-center">
                  <button type="button" class="btn btn-sm btn-outline-primary" onclick="selectAll('read')">
                    <i class="ri-checkbox-multiple-line"></i> All
                  </button>
                </th>
                <th class="text-center">
                  <button type="button" class="btn btn-sm btn-outline-primary" onclick="selectAll('update')">
                    <i class="ri-checkbox-multiple-line"></i> All
                  </button>
                </th>
                <th class="text-center">
                  <button type="button" class="btn btn-sm btn-outline-primary" onclick="selectAll('delete')">
                    <i class="ri-checkbox-multiple-line"></i> All
                  </button>
                </th>
                <th class="text-center">
                  <button type="button" class="btn btn-sm btn-outline-primary" onclick="selectAll('extra')">
                    <i class="ri-checkbox-multiple-line"></i> All
                  </button>
                </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php
                $currentPermissions = is_array($permissions) ? $permissions : [];
              @endphp
              @foreach($modules as $moduleName => $moduleKey)
                @php
                  $modulePerms = $currentPermissions[$moduleName] ?? [];
                @endphp
                <tr>
                  <td><strong>{{ $moduleName }}</strong></td>
                  <td class="text-center">
                    <input type="checkbox" 
                           name="permissions[{{ $moduleName }}][create]" 
                           value="1" 
                           class="form-check-input permission-checkbox permission-create"
                           {{ isset($modulePerms['create']) && $modulePerms['create'] ? 'checked' : '' }}>
                  </td>
                  <td class="text-center">
                    <input type="checkbox" 
                           name="permissions[{{ $moduleName }}][read]" 
                           value="1" 
                           class="form-check-input permission-checkbox permission-read"
                           {{ isset($modulePerms['read']) && $modulePerms['read'] ? 'checked' : '' }}>
                  </td>
                  <td class="text-center">
                    <input type="checkbox" 
                           name="permissions[{{ $moduleName }}][update]" 
                           value="1" 
                           class="form-check-input permission-checkbox permission-update"
                           {{ isset($modulePerms['update']) && $modulePerms['update'] ? 'checked' : '' }}>
                  </td>
                  <td class="text-center">
                    <input type="checkbox" 
                           name="permissions[{{ $moduleName }}][delete]" 
                           value="1" 
                           class="form-check-input permission-checkbox permission-delete"
                           {{ isset($modulePerms['delete']) && $modulePerms['delete'] ? 'checked' : '' }}>
                  </td>
                  <td class="text-center">
                    <input type="checkbox" 
                           name="permissions[{{ $moduleName }}][extra]" 
                           value="1" 
                           class="form-check-input permission-checkbox permission-extra"
                           {{ isset($modulePerms['extra']) && $modulePerms['extra'] ? 'checked' : '' }}>
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-sm btn-outline-success" onclick="selectModule('{{ $moduleName }}', true)" title="Select All">
                      <i class="ri-checkbox-multiple-line"></i> All
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger ms-1" onclick="selectModule('{{ $moduleName }}', false)" title="Deselect All">
                      <i class="ri-close-line"></i> None
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
            <button type="button" class="btn btn-outline-primary" onclick="selectAllModules(true)">
              <i class="ri-checkbox-multiple-line me-1"></i>Select All Modules
            </button>
            <button type="button" class="btn btn-outline-secondary ms-2" onclick="selectAllModules(false)">
              <i class="ri-close-line me-1"></i>Deselect All Modules
            </button>
          </div>
          <div>
            <a href="{{ route('role-masters.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">
              <i class="ri-save-line me-1"></i>Save Permissions
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function selectAll(type) {
  const checkboxes = document.querySelectorAll(`.permission-${type}`);
  const allChecked = Array.from(checkboxes).every(cb => cb.checked);
  checkboxes.forEach(cb => {
    cb.checked = !allChecked;
  });
}

function selectModule(moduleName, select) {
  const checkboxes = document.querySelectorAll(`input[name^="permissions[${moduleName}]"]`);
  checkboxes.forEach(cb => {
    cb.checked = select;
  });
}

function selectAllModules(select) {
  const checkboxes = document.querySelectorAll('.permission-checkbox');
  checkboxes.forEach(cb => {
    cb.checked = select;
  });
}
</script>
@endsection

