@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Create Job</h4>
        <p class="text-muted mb-0">Add a new job opening to Talent Hub</p>
    </div>
    <a href="{{URL::to('/admin/talent-hub')}}" class="btn btn-outline-secondary">
        <i class="ri ri-arrow-left-line"></i> Back to Jobs
    </a>
</div>

<form>

    <!-- Job Details -->
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="mb-0">Job Details</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Job Title</label>
                    <input type="text" class="form-control" placeholder="e.g. Backend Developer">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Department</label>
                    <select class="form-select">
                        <option>Select</option>
                        <option>Tech</option>
                        <option>Operations</option>
                        <option>Support</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Location</label>
                    <select class="form-select">
                        <option>Select</option>
                        <option>Durgapur</option>
                        <option>Kolkata</option>
                        <option>Remote</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Experience Required</label>
                    <select class="form-select">
                        <option>Select</option>
                        <option>Fresher</option>
                        <option>Experienced</option>
                    </select>
                </div>

                <div class="col-md-9">
                    <label class="form-label">Skills Required</label>
                    <input type="text" class="form-control" placeholder="Node.js, MongoDB, Laravel">
                    <small class="text-muted">Comma separated skills</small>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Job Description</label>
                    <textarea class="form-control" rows="4"
                        placeholder="Describe roles, responsibilities, requirements..."></textarea>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Application Limit</label>
                    <input type="number" class="form-control" placeholder="e.g. 20">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option>Draft</option>
                        <option>Published</option>
                    </select>
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
                    <input type="text" class="form-control" placeholder="Manager Name">
                    <small class="text-muted">Internal use only (not visible on career page)</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Specify Project
                    </label>
                    <input type="text" class="form-control" placeholder="Project Code / Name">
                    <small class="text-muted">Internal use only</small>
                </div>

            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-end gap-2">
        <button type="button" class="btn btn-outline-secondary">
            Save as Draft
        </button>
        <button type="submit" class="btn btn-primary">
            Publish Job
        </button>
    </div>

</form>

              </div>
              </div>


@endsection
s