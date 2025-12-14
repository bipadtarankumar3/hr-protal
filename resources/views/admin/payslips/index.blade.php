@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-money-rupee-circle-line me-2"></i>Payslips</h4>
      <p class="text-muted">List of payslips and generation tools (demo).</p>
      <div class="mt-3">
        <a href="{{ url('/admin/payslips/generate') }}" class="btn btn-primary">Generate Payslips</a>
      </div>
    </div>
  </div>
</div>
@endsection
