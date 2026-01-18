@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Create Module Card</h4>
      <p class="text-muted mb-0">Add a new module card.</p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ url('/admin/module-cards') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="card_title" class="form-label">Card Title</label>
            <input type="text" class="form-control" id="card_title" name="card_title" placeholder="e.g., Talent Hub" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="icon_class" class="form-label">Icon Class</label>
            <input type="text" class="form-control" id="icon_class" name="icon_class" placeholder="e.g., ri ri-briefcase-line">
          </div>
          <div class="col-12 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Card description..." required></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label for="module_link" class="form-label">Module Link</label>
            <input type="text" class="form-control" id="module_link" name="module_link" placeholder="e.g., /admin/talent-hub">
          </div>
          <div class="col-md-6 mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="0" value="0" required>
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Create Card</button>
          <a href="{{ url('/admin/module-cards') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
