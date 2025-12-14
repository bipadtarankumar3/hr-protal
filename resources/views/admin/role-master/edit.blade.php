@extends('admin.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3">Edit Role</h4>
      <form>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Role Title</label>
            <input class="form-control" value="Senior Backend Developer">
          </div>
          <div class="col-md-2">
            <label class="form-label">Level</label>
            <select class="form-select"><option>Intern</option><option>Associate</option><option selected>Senior</option><option>Manager</option><option>CXO</option></select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Department</label>
            <input class="form-control" value="Tech">
          </div>
          <div class="col-md-3">
            <label class="form-label">Reports To</label>
            <input class="form-control" value="Engineering Manager">
          </div>
        </div>

        <hr class="my-4">

        <h6>Permissions</h6>
        <p class="text-muted">Toggle module-level permissions for this role.</p>

        <div class="table-responsive">
          <table class="table align-middle">
            <thead class="table-light">
              <tr><th>Module</th><th class="text-center">Create</th><th class="text-center">Read</th><th class="text-center">Update</th><th class="text-center">Delete</th><th class="text-center">Extra</th></tr>
            </thead>
            <tbody>
              @php $modules = ['Talent Hub','Hire Desk','Onboard Pro','Team Map','Pulse Log','Time Away','Leave Track','Pay Pulse','Audit Trail','Role Master']; @endphp
              @foreach($modules as $m)
              <tr>
                <td>{{ $m }}</td>
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><input type="checkbox" checked></td>
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><input type="checkbox"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
          <a href="{{ url('/admin/role-master') }}" class="btn btn-secondary me-2">Cancel</a>
          <button class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
