@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-time-line me-2"></i>Audit Log #{{ $id }}</h4>
      <p class="text-muted">Details for audit entry {{ $id }} (demo).</p>
    </div>
  </div>
</div>
@endsection
