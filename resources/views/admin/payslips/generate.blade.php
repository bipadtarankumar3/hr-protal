`@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-money-rupee-circle-line me-2"></i>Generate Payslips</h4>
      <p class="text-muted">Select month/year and generate payslips (demo only).</p>

      <form class="row g-3 mt-3">
        <div class="col-md-4">
          <label class="form-label">Month</label>
          <select class="form-select"><option>January</option><option selected>December</option></select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Year</label>
          <input class="form-control" value="2025" />
        </div>
        <div class="col-md-4 d-grid">
          <button class="btn btn-primary">Generate</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection
