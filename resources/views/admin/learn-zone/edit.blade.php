@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-edit-line me-2"></i>Edit Course</h4>
      
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

      <form method="post" action="{{ route('learn-zone.update', $learnZone->id) }}">
        @csrf
        @method('PUT')
        <div class="row g-3">
          <div class="col-md-12">
            <label class="form-label">Course Name <span class="text-danger">*</span></label>
            <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" placeholder="Course name" value="{{ old('course_name', $learnZone->course_name) }}">
            @error('course_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Instructor Name</label>
            <input type="text" name="instructor_name" class="form-control @error('instructor_name') is-invalid @enderror" placeholder="Instructor name" value="{{ old('instructor_name', $learnZone->instructor_name) }}">
            @error('instructor_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Duration (hours) <span class="text-danger">*</span></label>
            <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Hours" value="{{ old('duration', $learnZone->duration) }}">
            @error('duration') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $learnZone->start_date?->format('Y-m-d')) }}">
            @error('start_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $learnZone->end_date?->format('Y-m-d')) }}">
            @error('end_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
              <option value="active" {{ old('status', $learnZone->status) === 'active' ? 'selected' : '' }}>Active</option>
              <option value="pending" {{ old('status', $learnZone->status) === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="completed" {{ old('status', $learnZone->status) === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Course description" rows="3">{{ old('description', $learnZone->description) }}</textarea>
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('learn-zone.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection