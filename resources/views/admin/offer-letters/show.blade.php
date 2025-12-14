@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-mail-send-line me-2"></i>Offer Letter #{{ $id }}</h4>
      <p class="text-muted">Preview of offer letter (static demo for id {{ $id }}).</p>
    </div>
  </div>
</div>
@endsection
