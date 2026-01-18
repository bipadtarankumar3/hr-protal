@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Dashboard Metrics</h4>
      <p class="text-muted mb-0">Manage KPI cards displayed on the dashboard.</p>
    </div>
    <a href="{{ url('/admin/dashboard-metrics/create') }}" class="btn btn-primary"><i class="ri ri-add-line"></i> Add Metric</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th>Label</th>
            <th>Key</th>
            <th>Value</th>
            <th>Icon</th>
            <th>Module</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($metrics as $metric)
          <tr>
            <td>{{ $metric->metric_label }}</td>
            <td><code>{{ $metric->metric_key }}</code></td>
            <td><strong>{{ $metric->metric_value }}</strong></td>
            <td><i class="{{ $metric->icon_class }}"></i></td>
            <td>{{ $metric->reference_module }}</td>
            <td class="text-end">
              <a href="{{ url('/admin/dashboard-metrics/' . $metric->id . '/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
              <form action="{{ url('/admin/dashboard-metrics/' . $metric->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center text-muted">No metrics found. <a href="{{ url('/admin/dashboard-metrics/create') }}">Create one</a></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
