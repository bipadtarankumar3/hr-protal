@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Create Dashboard Metric</h4>
      <p class="text-muted mb-0">Add a new KPI card to the dashboard.</p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ url('/admin/dashboard-metrics') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="metric_label" class="form-label">Metric Label</label>
            <input type="text" class="form-control" id="metric_label" name="metric_label" placeholder="e.g., Total Employees" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="metric_key" class="form-label">Metric Key (unique)</label>
            <input type="text" class="form-control" id="metric_key" name="metric_key" placeholder="e.g., total_employees" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="metric_value" class="form-label">Metric Value</label>
            <input type="number" class="form-control" id="metric_value" name="metric_value" placeholder="e.g., 128" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="icon_class" class="form-label">Icon Class (e.g., ri ri-group-line)</label>
            <input type="text" class="form-control" id="icon_class" name="icon_class" placeholder="e.g., ri ri-group-line">
          </div>
          <div class="col-md-6 mb-3">
            <label for="badge_class" class="form-label">Badge Color Class</label>
            <select class="form-select" id="badge_class" name="badge_class" required>
              <option value="bg-label-primary">Primary (Blue)</option>
              <option value="bg-label-success">Success (Green)</option>
              <option value="bg-label-warning">Warning (Orange)</option>
              <option value="bg-label-danger">Danger (Red)</option>
              <option value="bg-label-info">Info (Cyan)</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="reference_module" class="form-label">Reference Module</label>
            <input type="text" class="form-control" id="reference_module" name="reference_module" placeholder="e.g., Talent Vault">
          </div>
          <div class="col-md-6 mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="0" value="0" required>
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Create Metric</button>
          <a href="{{ url('/admin/dashboard-metrics') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
