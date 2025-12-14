@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri ri-building-line me-2"></i>Department: {{ $id }}</h4>
      <p class="text-muted">Details for department <strong>{{ $id }}</strong>. (Static demo content.)</p>
    </div>
  </div>
</div>
@endsection
