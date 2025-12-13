@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Job Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Backend Developer</h5>
            <p class="card-text"><strong>Department:</strong> Tech</p>
            <p class="card-text"><strong>Location:</strong> Kolkata</p>
            <p class="card-text"><strong>Experience Required:</strong> Fresher</p>
            <p class="card-text"><strong>Skills:</strong> Node.js, MongoDB</p>
            <p class="card-text"><strong>Description:</strong> Write job description here...</p>
            <p class="card-text"><strong>Status:</strong> Published</p>
            <a href="{{ url('/admin/talent-hub/1/edit') }}" class="btn btn-primary">Edit</a>
            <a href="{{ url('/admin/talent-hub') }}" class="btn btn-secondary ms-2">Back</a>
        </div>
    </div>
</div>
@endsection
