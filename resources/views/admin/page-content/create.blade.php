@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Create Page Content</h4>
      <p class="text-muted mb-0">Add new dynamic content to a page section.</p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ url('/admin/page-content') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="page_name" class="form-label">Page Name</label>
            <input type="text" class="form-control" id="page_name" name="page_name" placeholder="e.g., home" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="section_name" class="form-label">Section Name</label>
            <input type="text" class="form-control" id="section_name" name="section_name" placeholder="e.g., hero" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Section title">
          </div>
          <div class="col-md-6 mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="0" value="0" required>
          </div>
          <div class="col-12 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description..."></textarea>
          </div>
          <div class="col-12 mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4" placeholder="Main content..."></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Create Content</button>
          <a href="{{ url('/admin/page-content') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
