@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3">Create User</h4>
      <form>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Full Name</label>
            <input class="form-control" placeholder="John Doe">
          </div>
          <div class="col-md-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="john@example.com">
          </div>
          <div class="col-md-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control">
          </div>
        </div>

        <div class="row g-3 mt-3">
          <div class="col-md-4">
            <label class="form-label">Role</label>
            <select class="form-select">
              <option>Admin</option>
              <option>CHRO</option>
              <option>Finance</option>
              <option>Manager</option>
              <option>Employee</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Status</label>
            <select class="form-select"><option selected>Active</option><option>Inactive</option></select>
          </div>
        </div>

        <hr class="my-4">
        <h6>Permission Overrides (optional)</h6>
        <p class="text-muted">If set, these will override role permissions for this user.</p>
        <div class="d-flex gap-3 flex-wrap">
          <label class="form-check form-check-inline"><input class="form-check-input" type="checkbox"> Can create jobs</label>
          <label class="form-check form-check-inline"><input class="form-check-input" type="checkbox"> Can approve payslips</label>
          <label class="form-check form-check-inline"><input class="form-check-input" type="checkbox"> Can manage payroll</label>
        </div>

        <div class="d-flex justify-content-end mt-4">
          <a href="{{ url('/admin/users') }}" class="btn btn-secondary me-2">Cancel</a>
          <button class="btn btn-primary">Create User</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
