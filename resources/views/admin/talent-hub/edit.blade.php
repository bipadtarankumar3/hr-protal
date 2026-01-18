@extends('admin.layouts.app')

@section('content')

 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Edit Job</h4>
        <p class="text-muted mb-0">Update job opening details</p>
    </div>
    <a href="{{URL::to('/admin/talent-hub')}}" class="btn btn-outline-secondary">
        <i class="ri ri-arrow-left-line"></i> Back to Jobs
    </a>
</div>

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

<form method="POST" action="{{ route('talent-hubs.update', $talent->id) }}">
    @csrf
    @method('PUT')

    <!-- Job Details -->
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="mb-0">Job Details</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Job Title</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           placeholder="e.g. Backend Developer" value="{{ old('name', $talent->name) }}" required>
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Department</label>
                    <select name="department" class="form-select @error('department') is-invalid @enderror" required>
                        <option value="">Select</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->name }}" {{ old('department', $talent->department) == $dept->name ? 'selected' : '' }}>
                                {{ $dept->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Location</label>
                    <select name="location" class="form-select @error('location') is-invalid @enderror">
                        <option value="">Select</option>
                        <option value="Durgapur" {{ old('location', $talent->location) == 'Durgapur' ? 'selected' : '' }}>Durgapur</option>
                        <option value="Kolkata" {{ old('location', $talent->location) == 'Kolkata' ? 'selected' : '' }}>Kolkata</option>
                        <option value="Remote" {{ old('location', $talent->location) == 'Remote' ? 'selected' : '' }}>Remote</option>
                    </select>
                    @error('location') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Experience Required</label>
                    <select name="experience_level" class="form-select @error('experience_level') is-invalid @enderror">
                        <option value="">Select</option>
                        <option value="junior" {{ old('experience_level', $talent->experience_level) == 'junior' ? 'selected' : '' }}>Fresher</option>
                        <option value="mid" {{ old('experience_level', $talent->experience_level) == 'mid' ? 'selected' : '' }}>Experienced</option>
                    </select>
                    @error('experience_level') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-9">
                    <label class="form-label">Skills Required</label>
                    <input type="text" name="skills" class="form-control @error('skills') is-invalid @enderror" 
                           placeholder="Node.js, MongoDB, Laravel" value="{{ old('skills', $talent->skills) }}">
                    @error('skills') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    <small class="text-muted">Comma separated skills</small>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Job Description</label>
                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="4"
                        placeholder="Describe roles, responsibilities, requirements...">{{ old('notes', $talent->notes) }}</textarea>
                    @error('notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Application Limit</label>
                    <input type="number" name="application_limit" class="form-control @error('application_limit') is-invalid @enderror" 
                           placeholder="e.g. 20" value="{{ old('application_limit', $talent->application_limit) }}">
                    @error('application_limit') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="pending" {{ old('status', $talent->status) == 'pending' ? 'selected' : '' }}>Draft</option>
                        <option value="active" {{ old('status', $talent->status) == 'active' ? 'selected' : '' }}>Published</option>
                        <option value="closed" {{ old('status', $talent->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

            </div>
        </div>
    </div>

    <!-- Internal HR Info -->
    <div class="card mb-4 border-warning">
        <div class="card-header bg-label-warning">
            <h6 class="mb-0">Internal HR Information</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">
                        Job On Request (Hiring Manager)
                    </label>
                    <input type="text" name="hiring_manager" class="form-control @error('hiring_manager') is-invalid @enderror" 
                           placeholder="Manager Name" value="{{ old('hiring_manager', $talent->hiring_manager) }}">
                    @error('hiring_manager') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    <small class="text-muted">Internal use only (not visible on career page)</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Specify Project
                    </label>
                    <input type="text" name="project" class="form-control @error('project') is-invalid @enderror" 
                           placeholder="Project Code / Name" value="{{ old('project', $talent->project) }}">
                    @error('project') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    <small class="text-muted">Internal use only</small>
                </div>

            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('talent-hubs.index') }}" class="btn btn-outline-secondary">
            Cancel
        </a>
        <button type="submit" class="btn btn-primary">
            Update Job
        </button>
    </div>

</form>

              </div>
              </div>

@endsection
