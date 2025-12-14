@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri ri-building-line me-2"></i>Departments</h4>
      <p class="text-muted">Overview of departments and heads. UI-only demo page.</p>

      <div class="row g-3 mt-4">
        <div class="col-md-6">
          <div class="card p-3">
            <h6 class="mb-1">HR</h6>
            <p class="mb-0 text-muted">Head: HR Manager / Reports to: Deblina (CHRO & COO)</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card p-3">
            <h6 class="mb-1">Finance</h6>
            <p class="mb-0 text-muted">Head: Finance Manager / Reports to: Tapas (CFO & CMO)</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
