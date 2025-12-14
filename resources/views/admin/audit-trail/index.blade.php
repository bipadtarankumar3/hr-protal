@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-time-line me-2"></i>Audit Trail</h4>
      <p class="text-muted">List of recent actions (demo).</p>

      <table class="table mt-3">
        <thead>
          <tr><th>Who</th><th>Action</th><th>When</th><th>Details</th></tr>
        </thead>
        <tbody>
          <tr><td>HR Admin</td><td>Created Offer</td><td>2025-12-14</td><td><a href="#">View</a></td></tr>
        </tbody>
      </table>

    </div>
  </div>
</div>
@endsection
