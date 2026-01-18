@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0"><i class="ri-eye-line me-2"></i>Talent Details</h4>
        <div class="btn-group">
          <a href="{{ route('talent-hubs.edit', $talent->id) }}" class="btn btn-warning">
            <i class="ri-edit-line me-1"></i>Edit
          </a>
          <a href="{{ route('talent-hubs.index') }}" class="btn btn-secondary">
            <i class="ri-arrow-left-line me-1"></i>Back
          </a>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-6">
          <div class="card bg-light">
            <div class="card-body">
              <h6 class="text-muted mb-3">Basic Information</h6>
              <table class="table table-borderless mb-0">
                <tr>
                  <td width="40%"><strong>Name:</strong></td>
                  <td>{{ $talent->name }}</td>
                </tr>
                <tr>
                  <td><strong>Employee:</strong></td>
                  <td>
                    @if($talent->employee)
                      {{ $talent->employee->name }} ({{ $talent->employee->email }})
                    @else
                      <span class="text-muted">N/A</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Department:</strong></td>
                  <td>
                    @if($talent->departmentRelation)
                      <span class="badge bg-info">{{ $talent->departmentRelation->name }}</span>
                      <small class="text-muted">({{ $talent->departmentRelation->code }})</small>
                    @elseif($talent->department)
                      <span class="badge bg-info">{{ $talent->department }}</span>
                    @else
                      <span class="badge bg-secondary">N/A</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Experience Level:</strong></td>
                  <td>
                    @php
                      $levelColors = ['junior' => 'success', 'mid' => 'warning', 'senior' => 'danger', 'lead' => 'dark'];
                      $color = $levelColors[$talent->experience_level] ?? 'secondary';
                    @endphp
                    <span class="badge bg-{{ $color }}">
                      {{ ucfirst($talent->experience_level ?? 'N/A') }}
                    </span>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-light">
            <div class="card-body">
              <h6 class="text-muted mb-3">Additional Information</h6>
              <table class="table table-borderless mb-0">
                <tr>
                  <td width="40%"><strong>Skills:</strong></td>
                  <td>{{ $talent->skills ?? 'N/A' }}</td>
                </tr>
                <tr>
                  <td><strong>Career Path:</strong></td>
                  <td>{{ $talent->career_path ?? 'N/A' }}</td>
                </tr>
                <tr>
                  <td><strong>Applied Date:</strong></td>
                  <td>{{ $talent->applied_date ? $talent->applied_date->format('d M Y') : 'N/A' }}</td>
                </tr>
                <tr>
                  <td><strong>Status:</strong></td>
                  <td>
                    @php
                      $statusColors = ['active' => 'success', 'inactive' => 'secondary', 'pending' => 'warning', 'closed' => 'danger'];
                      $statusColor = $statusColors[$talent->status] ?? 'secondary';
                    @endphp
                    <span class="badge bg-{{ $statusColor }}">
                      {{ ucfirst($talent->status ?? 'N/A') }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td><strong>Active:</strong></td>
                  <td>
                    @if($talent->is_active)
                      <span class="badge bg-success">Active</span>
                    @else
                      <span class="badge bg-secondary">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Created At:</strong></td>
                  <td>{{ $talent->created_at->format('d M Y, h:i A') }}</td>
                </tr>
                <tr>
                  <td><strong>Updated At:</strong></td>
                  <td>{{ $talent->updated_at->format('d M Y, h:i A') }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      @if($talent->notes)
        <div class="card mt-4">
          <div class="card-header">
            <h5 class="mb-0"><i class="ri-file-text-line me-2"></i>Notes</h5>
          </div>
          <div class="card-body">
            <p class="mb-0">{{ $talent->notes }}</p>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
