@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Edit Feature</h4>
      <p class="text-muted mb-0">Update feature details.</p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ url('/admin/features/' . $feature->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="feature_name" class="form-label">Feature Name</label>
            <input type="text" class="form-control" id="feature_name" name="feature_name" value="{{ $feature->feature_name }}" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="icon_class" class="form-label">Icon Class</label>
            <input type="text" class="form-control" id="icon_class" name="icon_class" value="{{ $feature->icon_class }}">
          </div>
          <div class="col-12 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $feature->description }}</textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ $feature->sort_order }}" required>
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Update Feature</button>
          <a href="{{ url('/admin/features') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
