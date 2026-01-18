@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Create Feature</h4>
      <p class="text-muted mb-0">Add a new feature to the home page.</p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ url('/admin/features') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="feature_name" class="form-label">Feature Name</label>
            <input type="text" class="form-control" id="feature_name" name="feature_name" placeholder="e.g., Talent Hub" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="icon_class" class="form-label">Icon Class</label>
            <input type="text" class="form-control" id="icon_class" name="icon_class" placeholder="e.g., fas fa-user-tie">
          </div>
          <div class="col-12 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Feature description..." required></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="0" value="0" required>
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Create Feature</button>
          <a href="{{ url('/admin/features') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
