@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-edit-line me-2"></i>Edit Payslip</h4>
      
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

      <form method="post" action="{{ route('payslips.update', $payslip->id) }}">
        @csrf
        @method('PUT')
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Employee ID <span class="text-danger">*</span></label>
            <input type="number" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" placeholder="Employee ID" value="{{ old('employee_id', $payslip->employee_id) }}">
            @error('employee_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-4">
            <label class="form-label">Month <span class="text-danger">*</span></label>
            <input type="number" name="month" class="form-control @error('month') is-invalid @enderror" placeholder="01-12" min="1" max="12" value="{{ old('month', $payslip->month) }}">
            @error('month') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-4">
            <label class="form-label">Year <span class="text-danger">*</span></label>
            <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" placeholder="YYYY" value="{{ old('year', $payslip->year) }}">
            @error('year') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Gross Salary <span class="text-danger">*</span></label>
            <input type="number" name="gross_salary" class="form-control @error('gross_salary') is-invalid @enderror" placeholder="0.00" step="0.01" value="{{ old('gross_salary', $payslip->gross_salary) }}">
            @error('gross_salary') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Deductions <span class="text-danger">*</span></label>
            <input type="number" name="deductions" class="form-control @error('deductions') is-invalid @enderror" placeholder="0.00" step="0.01" value="{{ old('deductions', $payslip->deductions) }}">
            @error('deductions') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
              <option value="pending" {{ old('status', $payslip->status) === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ old('status', $payslip->status) === 'approved' ? 'selected' : '' }}>Approved</option>
              <option value="paid" {{ old('status', $payslip->status) === 'paid' ? 'selected' : '' }}>Paid</option>
            </select>
            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('payslips.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection