@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Users</h4>
      <p class="text-muted mb-0">Admin-managed users: create accounts and assign roles/permissions.</p>
    </div>
    <a href="{{ url('/admin/users/create') }}" class="btn btn-primary"><i class="ri ri-add-line"></i> Create User</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th class="text-end">Actions</th></tr>
        </thead>
        <tbody>
          <tr>
            <td>Suvam</td>
            <td>suvam@example.com</td>
            <td>Founder / Admin</td>
            <td><span class="badge bg-success">Active</span></td>
            <td class="text-end"><a href="{{ url('/admin/users/1/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
          </tr>
          <tr>
            <td>Deblina</td>
            <td>deblina@example.com</td>
            <td>CHRO</td>
            <td><span class="badge bg-success">Active</span></td>
            <td class="text-end"><a href="{{ url('/admin/users/2/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
