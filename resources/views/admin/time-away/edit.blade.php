@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-edit-line me-2"></i>Edit Leave Request</h4>
      
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

      <form method="post" action="{{ route('time-away.update', $timeAway->id) }}">
        @csrf
        @method('PUT')
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Employee ID <span class="text-danger">*</span></label>
            <input type="number" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" placeholder="Employee ID" value="{{ old('employee_id', $timeAway->employee_id) }}">
            @error('employee_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Leave Type <span class="text-danger">*</span></label>
            <select name="leave_type" class="form-control @error('leave_type') is-invalid @enderror">
              <option value="vacation" {{ old('leave_type', $timeAway->leave_type) === 'vacation' ? 'selected' : '' }}>Vacation</option>
              <option value="sick" {{ old('leave_type', $timeAway->leave_type) === 'sick' ? 'selected' : '' }}>Sick Leave</option>
              <option value="personal" {{ old('leave_type', $timeAway->leave_type) === 'personal' ? 'selected' : '' }}>Personal</option>
              <option value="unpaid" {{ old('leave_type', $timeAway->leave_type) === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
            </select>
            @error('leave_type') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Start Date <span class="text-danger">*</span></label>
            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $timeAway->start_date?->format('Y-m-d')) }}">
            @error('start_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">End Date <span class="text-danger">*</span></label>
            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $timeAway->end_date?->format('Y-m-d')) }}">
            @error('end_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Status <span class="text-danger">*</span></label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
              <option value="pending" {{ old('status', $timeAway->status) === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ old('status', $timeAway->status) === 'approved' ? 'selected' : '' }}>Approved</option>
              <option value="rejected" {{ old('status', $timeAway->status) === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Days</label>
            <input type="number" name="days" class="form-control @error('days') is-invalid @enderror" placeholder="Number of days" value="{{ old('days', $timeAway->days) }}">
            @error('days') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label">Reason</label>
            <textarea name="reason" class="form-control @error('reason') is-invalid @enderror" placeholder="Reason for leave" rows="3">{{ old('reason', $timeAway->reason) }}</textarea>
            @error('reason') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('time-away.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection