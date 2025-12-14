@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3">User: {{ $id }}</h4>
      <p class="text-muted">Static demo view for user #{{ $id }}. Shows assigned role and permission overrides.</p>

      <div class="row g-3 mt-3">
        <div class="col-md-4"><strong>Name</strong><div>Example User</div></div>
        <div class="col-md-4"><strong>Email</strong><div>user@example.com</div></div>
        <div class="col-md-4"><strong>Role</strong><div>CHRO</div></div>
      </div>

      <hr class="my-3">
      <h6>Permissions</h6>
      <ul>
        <li>Talent Hub: Read</li>
        <li>Hire Desk: Read, Create</li>
        <li>Pay Pulse: Read</li>
      </ul>

    </div>
  </div>
</div>
@endsection
