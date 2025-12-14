@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3">Create Team</h4>
      <form method="post" action="{{ url('/admin/teams') }}">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Team Name</label>
            <input name="name" class="form-control" placeholder="e.g. Tech Team">
          </div>
          <div class="col-md-6">
            <label class="form-label">Owner / Lead</label>
            <input name="lead" class="form-control" placeholder="e.g. Engineering Manager">
          </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
          <a href="{{ url('/admin/teams') }}" class="btn btn-secondary me-2">Cancel</a>
          <button class="btn btn-primary" type="submit">Create Team</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
