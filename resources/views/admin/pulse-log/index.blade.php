@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-time-line me-2 text-primary"></i>Pulse Log</h4>
                <p class="text-muted mb-0">Weekly attendance & time logging</p>
            </div>
            <a href="#" data-bs-toggle="modal" data-bs-target="#newEntryModal" class="btn btn-primary d-flex align-items-center">
                <i class="ri ri-add-line me-1"></i> New Entry
            </a>
        </div>

        <!-- Filter Form -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('pulse-logs.index') }}" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by action or description" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4 d-grid">
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="ri ri-search-line"></i> Load Records
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pulse Log Table -->
        <div class="card border-0 shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Action</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pulse_logs as $log)
                                <tr>
                                    <td>{{ $log->action }}</td>
                                    <td>{{ Str::limit($log->description, 50) }}</td>
                                    <td>
                                        @if($log->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($log->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $log->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('pulse-logs.show', $log->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        <a href="{{ route('pulse-logs.edit', $log->id) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="ri-inbox-line me-2"></i>No pulse logs found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $pulse_logs->links() }}
        </div>
   


            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th><i class="ri ri-calendar-2-line"></i> Day</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                                <th>Sun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Hours Row -->
                            <tr>
                                <td class="fw-semibold"><i class="ri ri-time-line"></i> Hours</td>
                                <td><input type="number" class="form-control text-center" value="8.00"></td>
                                <td><input type="number" class="form-control text-center" value="8.00"></td>
                                <td><input type="number" class="form-control text-center" value="8.00"></td>
                                <td><input type="number" class="form-control text-center" value="8.00"></td>
                                <td><input type="number" class="form-control text-center" value="8.00"></td>
                                <td><input type="number" class="form-control text-center" value="0.00"></td>
                                <td><input type="number" class="form-control text-center" value="0.00"></td>
                            </tr>
                            <!-- Status Row -->
                            <tr>
                                <td class="fw-semibold"><i class="ri ri-information-line"></i> Status</td>
                                <td><span class="badge bg-success"><i class="ri ri-checkbox-circle-line"></i> Present</span></td>
                                <td><span class="badge bg-success"><i class="ri ri-checkbox-circle-line"></i> Present</span></td>
                                <td><span class="badge bg-success"><i class="ri ri-checkbox-circle-line"></i> Present</span></td>
                                <td><span class="badge bg-warning"><i class="ri ri-sun-line"></i> Holiday</span></td>
                                <td><span class="badge bg-info"><i class="ri ri-flight-takeoff-line"></i> Leave</span></td>
                                <td><span class="badge bg-secondary"><i class="ri ri-calendar-close-line"></i> Weekend</span></td>
                                <td><span class="badge bg-secondary"><i class="ri ri-calendar-close-line"></i> Weekend</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Attendance Notes -->
        <div class="card mt-4 border-0 shadow-sm">
            <div class="card-body">
                <label class="form-label"><i class="ri ri-sticky-note-line me-1"></i>Notes (Optional)</label>
                <textarea class="form-control" rows="3" placeholder="Any remarks for this week..."></textarea>
            </div>
        </div>
        <!-- Actions -->
        <div class="d-flex justify-content-end mt-3 gap-2">
            <button class="btn btn-outline-secondary">
                <i class="ri ri-save-3-line"></i> Save Draft
            </button>
            <button class="btn btn-primary">
                <i class="ri ri-send-plane-2-line"></i> Submit Attendance
            </button>
        </div>
        <!-- New Entry Modal (Demo) -->
        <div class="modal fade" id="newEntryModal" tabindex="-1" aria-labelledby="newEntryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="newEntryModalLabel"><i class="ri ri-add-line me-1"></i> Add New Attendance Entry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Project Code</label>
                                    <select class="form-select">
                                        <option>RYDZAA-TECH-002</option>
                                        <option>RYDZAA-OPS-001</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Hours Worked</label>
                                    <input type="number" class="form-control" value="8.00">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Present</option>
                                        <option>Leave</option>
                                        <option>Holiday</option>
                                        <option>Weekend</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" rows="2" placeholder="Optional"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ri ri-close-line"></i> Cancel
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            <i class="ri ri-save-3-line"></i> Save Entry (Demo)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
