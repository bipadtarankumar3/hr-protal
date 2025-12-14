@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri ri-stack-line me-2"></i>{{ strtoupper($team) }} Team</h4>
      <p class="text-muted">Roles and example levels for the {{ ucfirst($team) }} team. (Static demo content.)</p>

      <div class="mt-4">
        <h6>Example Roles</h6>
        <ul>
          <li>Intern — {{ ucfirst($team) }} Intern</li>
          <li>Associate — Jr {{ ucfirst($team) }}</li>
          <li>Senior — Sr {{ ucfirst($team) }}</li>
          <li>Manager — {{ ucfirst($team) }} Manager</li>
        </ul>
      </div>

    </div>
  </div>
</div>
@endsection
