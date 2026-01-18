@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h4 class="mb-1"><i class="ri-building-line me-2"></i>{{ $department->name }}</h4>
              <span class="badge bg-info">{{ $department->code }}</span>
            </div>
            <div>
              <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">
                <i class="ri-edit-line"></i> Edit
              </a>
              <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                  <i class="ri-delete-line"></i> Delete
                </button>
              </form>
            </div>
          </div>

          <hr>

          <div class="row g-3">
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Department Code</h6>
              <p class="fw-bold">{{ $department->code }}</p>
            </div>
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Budget</h6>
              <p class="fw-bold">{{ $department->budget ? '$' . number_format($department->budget, 2) : 'N/A' }}</p>
            </div>
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Department Head</h6>
              <p class="fw-bold">{{ $department->head_id ? 'Employee #' . $department->head_id : 'Not Assigned' }}</p>
            </div>
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Status</h6>
              <span class="badge bg-success">Active</span>
            </div>
            <div class="col-md-12">
              <h6 class="text-muted mb-2">Description</h6>
              <p>{{ $department->description ?? 'No description provided' }}</p>
            </div>
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Created On</h6>
              <p class="fw-bold">{{ $department->created_at->format('Y-m-d H:i') }}</p>
            </div>
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Last Updated</h6>
              <p class="fw-bold">{{ $department->updated_at->format('Y-m-d H:i') }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h6 class="mb-3">Quick Actions</h6>
          <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-outline-primary w-100 mb-2">
            <i class="ri-edit-line"></i> Edit Department
          </a>
          <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary w-100">
            <i class="ri-arrow-left-line"></i> Back to List
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
