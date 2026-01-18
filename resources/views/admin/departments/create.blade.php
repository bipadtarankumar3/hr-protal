@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri-add-line me-2"></i>Create New Department</h4>
      
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

      <form method="post" action="{{ route('departments.store') }}">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Department Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                   placeholder="e.g. Engineering" value="{{ old('name') }}">
            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Code <span class="text-danger">*</span></label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" 
                   placeholder="e.g. ENG" value="{{ old('code') }}">
            @error('code') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                      placeholder="Department description" rows="3">{{ old('description') }}</textarea>
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Department Head (Employee ID)</label>
            <select name="head_id" class="form-control @error('head_id') is-invalid @enderror">
              <option value="">Select Department Head</option>
              @forelse($users as $user)
                <option value="{{ $user->id }}" {{ old('head_id') == $user->id ? 'selected' : '' }}>
                  {{ $user->name }} (ID: {{ $user->id }})
                </option>
              @empty
                <option disabled>No users available</option>
              @endforelse
            </select>
            @error('head_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Budget</label>
            <input type="number" name="budget" step="0.01" class="form-control @error('budget') is-invalid @enderror" 
                   placeholder="0.00" value="{{ old('budget') }}">
            @error('budget') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
          <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary" type="submit">Create Department</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
