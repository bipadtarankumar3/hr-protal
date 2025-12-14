@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-money-rupee-circle-line me-2"></i>Payslip #{{ $id }}</h4>
      <p class="text-muted">Payslip preview for id {{ $id }} (static demo).</p>
    </div>
  </div>
</div>
@endsection
