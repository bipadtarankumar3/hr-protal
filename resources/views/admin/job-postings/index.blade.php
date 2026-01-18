@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Job Postings</h4>
      <p class="text-muted mb-0">Manage job openings for careers page.</p>
    </div>
    <a href="{{ url('/admin/job-postings/create') }}" class="btn btn-primary"><i class="ri ri-add-line"></i> Create Job</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th>Job Title</th>
            <th>Department</th>
            <th>Status</th>
            <th>Applicants</th>
            <th>Location</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($jobs as $job)
          <tr>
            <td>{{ $job->job_title }}</td>
            <td>{{ $job->department }}</td>
            <td><span class="badge bg-{{ $job->status === 'open' ? 'success' : ($job->status === 'closed' ? 'danger' : 'warning') }}">{{ ucfirst($job->status) }}</span></td>
            <td>{{ $job->applicants_count }}</td>
            <td>{{ $job->location ?? '-' }}</td>
            <td class="text-end">
              <a href="{{ url('/admin/job-postings/' . $job->id . '/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
              <form action="{{ url('/admin/job-postings/' . $job->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center text-muted">No jobs found. <a href="{{ url('/admin/job-postings/create') }}">Create one</a></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
