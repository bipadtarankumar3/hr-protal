@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-mail-send-line me-2"></i>Offer Letters</h4>
      <p class="text-muted">List of generated offer letters (demo).</p>
      <div class="mt-3">
        <a href="{{ url('/admin/offer-letters/compose') }}" class="btn btn-primary">Compose Offer</a>
      </div>
    </div>
  </div>
</div>
@endsection
