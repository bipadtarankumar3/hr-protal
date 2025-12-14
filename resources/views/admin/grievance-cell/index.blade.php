@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri ri-service-line me-2"></i>Grievance Cell</h4>
      <p class="text-muted">Overview of grievance cell roles and quick actions.</p>

      <div class="mt-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newGrievance">New Grievance</button>
      </div>

      <!-- Simple modal -->
      <div class="modal fade" id="newGrievance" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Grievance (Demo)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Subject</label>
                <input class="form-control" />
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="4"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
