@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Edit Dashboard Metric</h4>
      <p class="text-muted mb-0">Update KPI card settings.</p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ url('/admin/dashboard-metrics/' . $metric->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="metric_label" class="form-label">Metric Label</label>
            <input type="text" class="form-control" id="metric_label" name="metric_label" value="{{ $metric->metric_label }}" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="metric_key" class="form-label">Metric Key (unique)</label>
            <input type="text" class="form-control" id="metric_key" name="metric_key" value="{{ $metric->metric_key }}" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="metric_value" class="form-label">Metric Value</label>
            <input type="number" class="form-control" id="metric_value" name="metric_value" value="{{ $metric->metric_value }}" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="icon_class" class="form-label">Icon Class</label>
            <input type="text" class="form-control" id="icon_class" name="icon_class" value="{{ $metric->icon_class }}">
          </div>
          <div class="col-md-6 mb-3">
            <label for="badge_class" class="form-label">Badge Color Class</label>
            <select class="form-select" id="badge_class" name="badge_class" required>
              <option value="bg-label-primary" {{ $metric->badge_class === 'bg-label-primary' ? 'selected' : '' }}>Primary (Blue)</option>
              <option value="bg-label-success" {{ $metric->badge_class === 'bg-label-success' ? 'selected' : '' }}>Success (Green)</option>
              <option value="bg-label-warning" {{ $metric->badge_class === 'bg-label-warning' ? 'selected' : '' }}>Warning (Orange)</option>
              <option value="bg-label-danger" {{ $metric->badge_class === 'bg-label-danger' ? 'selected' : '' }}>Danger (Red)</option>
              <option value="bg-label-info" {{ $metric->badge_class === 'bg-label-info' ? 'selected' : '' }}>Info (Cyan)</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="reference_module" class="form-label">Reference Module</label>
            <input type="text" class="form-control" id="reference_module" name="reference_module" value="{{ $metric->reference_module }}">
          </div>
          <div class="col-md-6 mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ $metric->sort_order }}" required>
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Update Metric</button>
          <a href="{{ url('/admin/dashboard-metrics') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
