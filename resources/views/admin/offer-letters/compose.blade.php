@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4><i class="ri ri-mail-send-line me-2"></i>Compose Offer Letter</h4>
      <p class="text-muted">UI to compose an offer letter template and preview (demo only).</p>

      <form class="mt-3">
        <div class="mb-3">
          <label class="form-label">Candidate Name</label>
          <input class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">CTC</label>
          <input class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">Template Body</label>
          <textarea class="form-control" rows="6">Dear {{ '{{name}}' }},

We are pleased to offer you...</textarea>
        </div>
        <button class="btn btn-primary">Preview</button>
      </form>

    </div>
  </div>
</div>
@endsection
