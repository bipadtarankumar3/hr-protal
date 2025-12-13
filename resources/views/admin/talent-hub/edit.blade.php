@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Edit Job</h2>
    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="title" value="Backend Developer">
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <select class="form-select" id="department">
                <option selected>Tech</option>
                <option>Ops</option>
                <option>Support</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <select class="form-select" id="location">
                <option selected>Kolkata</option>
                <option>Durgapur</option>
                <option>Remote</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="experience" class="form-label">Experience Required</label>
            <select class="form-select" id="experience">
                <option selected>Fresher</option>
                <option>Experienced</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="skills" class="form-label">Skills Required</label>
            <input type="text" class="form-control" id="skills" value="Node.js, MongoDB">
        </div>
        <div class="mb-3">
            <label for="job_description" class="form-label">Job Description</label>
            <textarea class="form-control" id="job_description" rows="3">Write job description here...</textarea>
        </div>
        <div class="mb-3">
            <label for="application_limit" class="form-label">Application Limit</label>
            <input type="number" class="form-control" id="application_limit" value="10">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status">
                <option selected>Draft</option>
                <option>Published</option>
                <option>Exhausted</option>
                <option>Closed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ url('/admin/talent-hub') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
