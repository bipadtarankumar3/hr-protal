@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1"><i class="ri ri-time-line me-2 text-primary"></i>Pulse Log</h4>
            <p class="text-muted mb-0">Manage attendance and time logging</p>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal" onclick="loadCreateForm()">
            <i class="ri ri-add-line me-1"></i> New Entry
        </button>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ri-check-line me-2"></i>{{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filter Section -->
    <div class="card mb-4 bg-light">
        <div class="card-body">
            <form method="GET" action="{{ route('pulse-logs.index') }}" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Search <small class="text-muted">(Employee Name, Email)</small></label>
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Employee</label>
                    <select name="employee_id" class="form-select">
                        <option value="">All Employees</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ request('employee_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="present" {{ request('status') == 'present' ? 'selected' : '' }}>Present</option>
                        <option value="absent" {{ request('status') == 'absent' ? 'selected' : '' }}>Absent</option>
                        <option value="late" {{ request('status') == 'late' ? 'selected' : '' }}>Late</option>
                        <option value="on_leave" {{ request('status') == 'on_leave' ? 'selected' : '' }}>On Leave</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Date From</label>
                    <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Date To</label>
                    <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                </div>
                <div class="col-md-1 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="ri-filter-3-line"></i> Filter
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
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pulse_logs as $log)
                            <tr>
                                <td>
                                    @if($log->employee)
                                        <strong>{{ $log->employee->name }}</strong>
                                        <br><small class="text-muted">{{ $log->employee->email }}</small>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>{{ $log->date->format('d M Y') }}</td>
                                <td>
                                    @if($log->check_in_time)
                                        {{ date('h:i A', strtotime($log->check_in_time)) }}
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @if($log->check_out_time)
                                        {{ date('h:i A', strtotime($log->check_out_time)) }}
                                    @else
                                        <span class="text-muted">Not checked out</span>
                                    @endif
                                </td>
                                <td>
                                    @if($log->duration_hours)
                                        <span class="badge bg-info">{{ number_format($log->duration_hours, 2) }} hrs</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $statusColors = [
                                            'present' => 'success',
                                            'absent' => 'danger',
                                            'late' => 'warning',
                                            'on_leave' => 'info'
                                        ];
                                        $color = $statusColors[$log->status] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $color }}">
                                        {{ ucfirst(str_replace('_', ' ', $log->status)) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadViewData({{ $log->id }})" title="View">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="loadEditForm({{ $log->id }})" title="Edit">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <form action="{{ route('pulse-logs.destroy', $log->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this attendance record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="ri-inbox-2-line ri-3x mb-2 d-block"></i>
                                    No attendance records found. <a href="#" data-bs-toggle="modal" data-bs-target="#createModal" onclick="loadCreateForm()">Create one</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Weekly Attendance View -->
    <div class="card mb-4 border-0 shadow my-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="ri ri-calendar-2-line me-2"></i>Weekly Attendance View 
                <small class="text-white-50">({{ $weekStart->format('d M') }} - {{ $weekEnd->format('d M Y') }})</small>
            </h5>
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
                            @foreach($weekDays as $day)
                                <td>
                                    @if($day['attendance'] && $day['attendance']->duration_hours)
                                        <input type="number" class="form-control text-center" value="{{ number_format($day['attendance']->duration_hours, 2) }}" readonly>
                                    @else
                                        <input type="number" class="form-control text-center" value="0.00" readonly>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <!-- Status Row -->
                        <tr>
                            <td class="fw-semibold"><i class="ri ri-information-line"></i> Status</td>
                            @foreach($weekDays as $day)
                                <td>
                                    @if($day['attendance'])
                                        @php
                                            $statusColors = [
                                                'present' => 'success',
                                                'absent' => 'danger',
                                                'late' => 'warning',
                                                'on_leave' => 'info'
                                            ];
                                            $color = $statusColors[$day['attendance']->status] ?? 'secondary';
                                            $statusLabels = [
                                                'present' => 'Present',
                                                'absent' => 'Absent',
                                                'late' => 'Late',
                                                'on_leave' => 'Leave'
                                            ];
                                            $label = $statusLabels[$day['attendance']->status] ?? 'Unknown';
                                            $icons = [
                                                'present' => 'ri-checkbox-circle-line',
                                                'absent' => 'ri-close-circle-line',
                                                'late' => 'ri-time-line',
                                                'on_leave' => 'ri-flight-takeoff-line'
                                            ];
                                            $icon = $icons[$day['attendance']->status] ?? 'ri-information-line';
                                        @endphp
                                        <span class="badge bg-{{ $color }}">
                                            <i class="ri {{ $icon }}"></i> {{ $label }}
                                        </span>
                                    @elseif($day['date']->isWeekend())
                                        <span class="badge bg-secondary">
                                            <i class="ri ri-calendar-close-line"></i> Weekend
                                        </span>
                                    @else
                                        <span class="badge bg-light text-dark">
                                            <i class="ri ri-dash-line"></i> No Record
                                        </span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Attendance Notes -->
        <div class="card-footer bg-light">
            <form id="weeklyNotesForm" onsubmit="saveWeeklyNotes(event)">
                <input type="hidden" name="employee_id" value="{{ $selectedEmployeeId }}">
                <input type="hidden" name="week_start_date" value="{{ $weekStart->format('Y-m-d') }}">
                <input type="hidden" name="week_end_date" value="{{ $weekEnd->format('Y-m-d') }}">
                <div class="row g-2 align-items-end">
                    <div class="col-md-10">
                        <label class="form-label"><i class="ri ri-sticky-note-line me-1"></i>Notes (Optional)</label>
                        <textarea name="notes" id="weeklyNotes" class="form-control" rows="2" placeholder="Any remarks for this week...">{{ $weeklyNote->notes ?? '' }}</textarea>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="ri-save-3-line me-1"></i> Save Notes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Pagination -->
    @if($pulse_logs->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $pulse_logs->links() }}
        </div>
    @endif

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ri-add-line me-2"></i>Create Attendance Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="createModalBody">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitCreateForm()">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel"><i class="ri-edit-line me-2"></i>Edit Attendance Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editModalBody">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitEditForm()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel"><i class="ri-eye-line me-2"></i>View Attendance Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewModalBody">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Load create form
    function loadCreateForm() {
        document.getElementById('createModalBody').innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
        
        fetch('{{ route("pulse-logs.create") }}', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('createModalBody').innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('createModalBody').innerHTML = '<div class="alert alert-danger">Error loading form</div>';
        });
    }

    // Load edit form
    function loadEditForm(id) {
        document.getElementById('editModalBody').innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
        
        fetch(`{{ url('admin/pulse-log') }}/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('editModalBody').innerHTML = html;
            const form = document.getElementById('editForm');
            if (form) {
                form.action = `{{ url('admin/pulse-log') }}/${id}`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('editModalBody').innerHTML = '<div class="alert alert-danger">Error loading form</div>';
        });
    }

    // Load view data
    function loadViewData(id) {
        document.getElementById('viewModalBody').innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
        
        fetch(`{{ url('admin/pulse-log') }}/${id}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('viewModalBody').innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('viewModalBody').innerHTML = '<div class="alert alert-danger">Error loading data</div>';
        });
    }

    // Submit create form
    function submitCreateForm() {
        const form = document.getElementById('createForm');
        if (!form) {
            alert('Form not found');
            return;
        }

        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                if (data.errors) {
                    let errorMsg = 'Validation errors:\n';
                    for (let field in data.errors) {
                        errorMsg += data.errors[field][0] + '\n';
                    }
                    alert(errorMsg);
                } else {
                    alert('Error: ' + (data.message || 'Failed to create'));
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error creating attendance record');
        });
    }

    // Submit edit form
    function submitEditForm() {
        const form = document.getElementById('editForm');
        if (!form) {
            alert('Form not found');
            return;
        }

        const formData = new FormData(form);
        formData.append('_method', 'PUT');
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                if (data.errors) {
                    let errorMsg = 'Validation errors:\n';
                    for (let field in data.errors) {
                        errorMsg += data.errors[field][0] + '\n';
                    }
                    alert(errorMsg);
                } else {
                    alert('Error: ' + (data.message || 'Failed to update'));
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating attendance record');
        });
    }

    // Save weekly notes
    function saveWeeklyNotes(event) {
        event.preventDefault();
        const form = document.getElementById('weeklyNotesForm');
        const formData = new FormData(form);
        const saveButton = form.querySelector('button[type="submit"]');
        const originalText = saveButton.innerHTML;
        
        saveButton.disabled = true;
        saveButton.innerHTML = '<i class="ri-loader-4-line ri-spin me-1"></i> Saving...';
        
        fetch('{{ route("pulse-logs.save-weekly-notes") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success alert-dismissible fade show mt-2';
                alertDiv.innerHTML = '<i class="ri-check-line me-2"></i>' + data.message + 
                    '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                form.parentElement.insertBefore(alertDiv, form.nextSibling);
                
                // Auto-dismiss after 3 seconds
                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
            } else {
                alert('Error: ' + (data.message || 'Failed to save notes'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving weekly notes');
        })
        .finally(() => {
            saveButton.disabled = false;
            saveButton.innerHTML = originalText;
        });
    }
</script>
@endpush
@endsection
