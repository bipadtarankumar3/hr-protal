@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-edit-line me-2"></i>Edit Post</h4>
      
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Validation Errors:</strong>
          <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <form method="post" action="{{ route('buzz-desk.update', $buzzDesk->id) }}">
        @csrf
        @method('PUT')
        <div class="row g-3">
          <div class="col-md-12">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Post title" value="{{ old('title', $buzzDesk->title) }}">
            @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" placeholder="Category" value="{{ old('category', $buzzDesk->category) }}">
            @error('category') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Status <span class="text-danger">*</span></label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
              <option value="published" {{ old('status', $buzzDesk->status) === 'published' ? 'selected' : '' }}>Published</option>
              <option value="draft" {{ old('status', $buzzDesk->status) === 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="archived" {{ old('status', $buzzDesk->status) === 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Post content" rows="5">{{ old('content', $buzzDesk->content) }}</textarea>
            @error('content') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('buzz-desk.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection