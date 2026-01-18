@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Create Job Posting</h4>
      <p class="text-muted mb-0">Add a new job opening.</p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ url('/admin/job-postings') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" placeholder="e.g., Senior Backend Developer" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="department" class="form-label">Department</label>
            <select class="form-select" id="department" name="department" required>
              <option value="">Select Department</option>
              @forelse($departments as $dept)
                <option value="{{ $dept->name }}" {{ old('department') == $dept->name ? 'selected' : '' }}>
                  {{ $dept->name }}
                </option>
              @empty
                <option disabled>No departments available</option>
              @endforelse
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
              <option value="open">Open</option>
              <option value="closed">Closed</option>
              <option value="filled">Filled</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="applicants_count" class="form-label">Applicants Count</label>
            <input type="number" class="form-control" id="applicants_count" name="applicants_count" placeholder="0" value="0" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="e.g., Durgapur">
          </div>
          <div class="col-md-6 mb-3">
            <label for="job_type" class="form-label">Job Type</label>
            <input type="text" class="form-control" id="job_type" name="job_type" placeholder="e.g., Full-time">
          </div>
          <div class="col-12 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Job description..."></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="0" value="0" required>
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Create Job</button>
          <a href="{{ url('/admin/job-postings') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
