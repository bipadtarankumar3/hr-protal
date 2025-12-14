@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-file-list-3-line me-2"></i>KYC - {{ $id }}</h4>
      <p class="text-muted">View uploaded documents and verification status for {{ $id }} (demo).</p>
    </div>
  </div>
</div>
@endsection
