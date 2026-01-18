@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-add-line me-2"></i>Add KYC Record</h4>
      
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

      <form method="post" action="{{ route('kyc.store') }}">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Employee ID <span class="text-danger">*</span></label>
            <input type="number" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" placeholder="Employee ID" value="{{ old('employee_id') }}">
            @error('employee_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Document Type <span class="text-danger">*</span></label>
            <select name="document_type" class="form-control @error('document_type') is-invalid @enderror">
              <option value="">Select Document</option>
              <option value="passport" {{ old('document_type') === 'passport' ? 'selected' : '' }}>Passport</option>
              <option value="id-card" {{ old('document_type') === 'id-card' ? 'selected' : '' }}>ID Card</option>
              <option value="driver-license" {{ old('document_type') === 'driver-license' ? 'selected' : '' }}>Driver License</option>
              <option value="pan-card" {{ old('document_type') === 'pan-card' ? 'selected' : '' }}>PAN Card</option>
            </select>
            @error('document_type') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Document Number</label>
            <input type="text" name="document_number" class="form-control @error('document_number') is-invalid @enderror" placeholder="Document number" value="{{ old('document_number') }}">
            @error('document_number') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Verification Status</label>
            <select name="verification_status" class="form-control @error('verification_status') is-invalid @enderror">
              <option value="pending" {{ old('verification_status') === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="verified" {{ old('verification_status') === 'verified' ? 'selected' : '' }}>Verified</option>
              <option value="rejected" {{ old('verification_status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            @error('verification_status') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label">Verified Date</label>
            <input type="date" name="verified_date" class="form-control @error('verified_date') is-invalid @enderror" value="{{ old('verified_date') }}">
            @error('verified_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" placeholder="Additional notes" rows="3">{{ old('notes') }}</textarea>
            @error('notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('kyc.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Create KYC</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection