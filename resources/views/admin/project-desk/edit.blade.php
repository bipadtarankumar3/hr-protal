@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-edit-line me-2"></i>Edit Project</h4>
      
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

      <form method="post" action="{{ route('project-desk.update', $projectDesk->id) }}">
        @csrf
        @method('PUT')
        <div class="row g-3">
          <div class="col-md-12">
            <label class="form-label">Project Name <span class="text-danger">*</span></label>
            <input type="text" name="project_name" class="form-control @error('project_name') is-invalid @enderror" placeholder="Project name" value="{{ old('project_name', $projectDesk->project_name) }}">
            @error('project_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Manager ID <span class="text-danger">*</span></label>
            <input type="number" name="manager_id" class="form-control @error('manager_id') is-invalid @enderror" placeholder="Manager Employee ID" value="{{ old('manager_id', $projectDesk->manager_id) }}">
            @error('manager_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Department ID</label>
            <input type="number" name="department_id" class="form-control @error('department_id') is-invalid @enderror" placeholder="Department ID" value="{{ old('department_id', $projectDesk->department_id) }}">
            @error('department_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $projectDesk->start_date?->format('Y-m-d')) }}">
            @error('start_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $projectDesk->end_date?->format('Y-m-d')) }}">
            @error('end_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
              <option value="active" {{ old('status', $projectDesk->status) === 'active' ? 'selected' : '' }}>Active</option>
              <option value="pending" {{ old('status', $projectDesk->status) === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="completed" {{ old('status', $projectDesk->status) === 'completed' ? 'selected' : '' }}>Completed</option>
              <option value="on-hold" {{ old('status', $projectDesk->status) === 'on-hold' ? 'selected' : '' }}>On Hold</option>
            </select>
            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Project description" rows="3">{{ old('description', $projectDesk->description) }}</textarea>
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('project-desk.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection