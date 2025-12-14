@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-file-list-3-line me-2"></i>KYC & Documents</h4>
      <p class="text-muted">Upload and verify candidate/employee documents (demo).</p>

      <div class="mt-3">
        <form class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Document Type</label>
            <select class="form-select">
              <option>Aadhaar</option>
              <option>PAN</option>
              <option>Bank Passbook</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Upload File</label>
            <input type="file" class="form-control" />
          </div>
          <div class="col-12">
            <button class="btn btn-primary">Upload</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
