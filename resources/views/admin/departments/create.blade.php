@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3">Create Department</h4>
      <form method="post" action="{{ url('/admin/departments') }}">
        @csrf
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Department Name</label>
            <input name="name" class="form-control" placeholder="e.g. Finance">
          </div>
          <div class="col-md-4">
            <label class="form-label">Head</label>
            <input name="head" class="form-control" placeholder="e.g. Finance Manager">
          </div>
          <div class="col-md-4">
            <label class="form-label">Reports To</label>
            <input name="reports_to" class="form-control" placeholder="e.g. CEO">
          </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
          <a href="{{ url('/admin/departments') }}" class="btn btn-secondary me-2">Cancel</a>
          <button class="btn btn-primary" type="submit">Create Department</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
