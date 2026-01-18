@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-add-line me-2"></i>Add Applicant</h4>
      
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

      <form method="post" action="{{ route('hire-desk.store') }}">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Position Name <span class="text-danger">*</span></label>
            <input type="text" name="position_name" class="form-control @error('position_name') is-invalid @enderror" placeholder="Job position" value="{{ old('position_name') }}">
            @error('position_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Candidate Name <span class="text-danger">*</span></label>
            <input type="text" name="candidate_name" class="form-control @error('candidate_name') is-invalid @enderror" placeholder="Full name" value="{{ old('candidate_name') }}">
            @error('candidate_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone number" value="{{ old('phone') }}">
            @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
              <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="selected" {{ old('status') === 'selected' ? 'selected' : '' }}>Selected</option>
              <option value="rejected" {{ old('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
              <option value="on-hold" {{ old('status') === 'on-hold' ? 'selected' : '' }}>On Hold</option>
            </select>
            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" placeholder="Application notes" rows="3">{{ old('notes') }}</textarea>
            @error('notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('hire-desk.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Add Applicant</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection