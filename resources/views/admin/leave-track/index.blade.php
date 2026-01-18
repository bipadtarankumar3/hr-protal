@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1"><i class="ri ri-calendar-check-line me-2"></i>Leave Track</h4>
                <p class="text-muted mb-0">Track and manage employee leaves</p>
            </div>
            {{-- <a href="{{ route('leave-tracks.create') }}" class="btn btn-primary">
                <i class="ri-add-line me-1"></i>New Leave Request
            </a> --}}
        </div>

        <!-- Filter Form -->
        <div class="card shadow-sm mb-4 w-100">
            <div class="card-body">
                <form method="GET" action="{{ route('leave-tracks.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by employee ID or leave type" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-outline-primary w-100">
                            <i class="ri-search-line me-1"></i>Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Leave Table -->
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Employee ID</th>
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leaves as $leave)
                            <tr>
                                <td>{{ $leave->employee_id }}</td>
                                <td>{{ $leave->leave_type }}</td>
                                <td>{{ $leave->start_date ? \Carbon\Carbon::parse($leave->start_date)->format('d M Y') : 'N/A' }}</td>
                                <td>{{ $leave->end_date ? \Carbon\Carbon::parse($leave->end_date)->format('d M Y') : 'N/A' }}</td>
                                <td>
                                    @if($leave->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($leave->status == 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>{{ $leave->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('leave-tracks.show', $leave->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="{{ route('leave-tracks.edit', $leave->id) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="ri-inbox-line me-2"></i>No leave records found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="w-100 mt-3">
            {{ $leaves->links() }}
        </div>
    
        <div class="tab-content">
            <!-- Leave Configuration -->
            <div class="tab-pane fade show active" id="leaveTypes">
                <div class="card border-0 shadow premium-card mb-4">
                    <div class="card-header premium-card-header">
                        <h6 class="mb-0 fw-semibold"><i class="ri ri-list-check-2"></i> Leave Types & Quotas</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0 align-middle text-center premium-table">
                            <thead>
                                <tr>
                                    <th><i class="ri ri-list-check-2"></i> Leave Type</th>
                                    <th><i class="ri ri-hashtag"></i> Quota</th>
                                    <th><i class="ri ri-arrow-left-right-line"></i> Carry Forward</th>
                                    <th><i class="ri ri-checkbox-circle-line"></i> Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Casual Leave</td>
                                    <td><input type="number" class="form-control text-center border-0 bg-light rounded-3" value="6"></td>
                                    <td><select class="form-select border-0 bg-light rounded-3"><option>Yes</option><option selected>No</option></select></td>
                                    <td><span class="badge bg-success premium-badge">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Sick Leave</td>
                                    <td><input type="number" class="form-control text-center border-0 bg-light rounded-3" value="6"></td>
                                    <td><select class="form-select border-0 bg-light rounded-3"><option>Yes</option><option selected>No</option></select></td>
                                    <td><span class="badge bg-success premium-badge">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Earned Leave</td>
                                    <td><input type="number" class="form-control text-center border-0 bg-light rounded-3" value="12"></td>
                                    <td><select class="form-select border-0 bg-light rounded-3"><option selected>Yes</option><option>No</option></select></td>
                                    <td><span class="badge bg-success premium-badge">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Maternity</td>
                                    <td><input type="number" class="form-control text-center border-0 bg-light rounded-3" value="90"></td>
                                    <td><span class="text-muted">N/A</span></td>
                                    <td><span class="badge bg-success premium-badge">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Paternity</td>
                                    <td><input type="number" class="form-control text-center border-0 bg-light rounded-3" value="5"></td>
                                    <td><span class="text-muted">N/A</span></td>
                                    <td><span class="badge bg-success premium-badge">Active</span></td>
                                </tr>
                                <tr>
                                    <td>LOP</td>
                                    <td><input type="number" class="form-control text-center border-0 bg-light rounded-3" value="0" disabled></td>
                                    <td><span class="text-muted">N/A</span></td>
                                    <td><span class="badge bg-warning premium-badge">Unpaid</span></td>
                                </tr>
                                <tr>
                                    <td>Comp Off</td>
                                    <td><input type="number" class="form-control text-center border-0 bg-light rounded-3" value="0"></td>
                                    <td><select class="form-select border-0 bg-light rounded-3"><option selected>Yes</option><option>No</option></select></td>
                                    <td><span class="badge bg-success premium-badge">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Occasional</td>
                                    <td><input type="number" class="form-control text-center border-0 bg-light rounded-3" value="2"></td>
                                    <td><select class="form-select border-0 bg-light rounded-3"><option>Yes</option><option selected>No</option></select></td>
                                    <td><span class="badge bg-success premium-badge">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-end bg-white border-0">
                        <button class="btn btn-primary premium-btn"><i class="ri ri-save-3-line"></i> Save Configuration</button>
                    </div>
                </div>
            </div>
            <!-- National Holidays -->
            <div class="tab-pane fade" id="nationalHolidays">
                <div class="card border-0 shadow premium-card mb-4">
                    <div class="card-header premium-card-header">
                        <h6 class="mb-0 fw-semibold"><i class="ri ri-flag-2-line"></i> National Holidays</h6>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 mb-3 align-items-end">
                            <div class="col-md-3">
                                <input type="date" class="form-control border-0 bg-light rounded-3">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control border-0 bg-light rounded-3" placeholder="Holiday Name (e.g. Independence Day)">
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control border-0 bg-light rounded-3" value="2025">
                            </div>
                            <div class="col-md-2 d-grid">
                                <button class="btn btn-outline-primary premium-btn w-100"><i class="ri ri-add-line"></i> Add</button>
                            </div>
                        </form>
                        <table class="table table-bordered text-center premium-table">
                            <thead>
                                <tr>
                                    <th><i class="ri ri-calendar-event-line"></i> Date</th>
                                    <th><i class="ri ri-flag-2-line"></i> Holiday</th>
                                    <th><i class="ri ri-calendar-2-line"></i> Year</th>
                                    <th><i class="ri ri-checkbox-circle-line"></i> Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15 Aug</td>
                                    <td>Independence Day</td>
                                    <td>2025</td>
                                    <td><span class="badge bg-success premium-badge">Published</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-secondary premium-btn"><i class="ri ri-save-3-line"></i> Save</button>
                            <button class="btn btn-success premium-btn"><i class="ri ri-send-plane-line"></i> Publish</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Regional Holidays -->
            <div class="tab-pane fade" id="regionalHolidays">
                <div class="card border-0 shadow premium-card mb-4">
                    <div class="card-header premium-card-header">
                        <h6 class="mb-0 fw-semibold"><i class="ri ri-map-pin-line"></i> Regional Holidays</h6>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 mb-3 align-items-end">
                            <div class="col-md-2">
                                <select class="form-select border-0 bg-light rounded-3">
                                    <option>State</option>
                                    <option>MH</option>
                                    <option>WB</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control border-0 bg-light rounded-3" placeholder="City (e.g. Mumbai)">
                            </div>
                            <div class="col-md-2">
                                <input type="date" class="form-control border-0 bg-light rounded-3">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control border-0 bg-light rounded-3" placeholder="Holiday Name (e.g. Ganesh Chaturthi)">
                            </div>
                            <div class="col-md-1">
                                <input type="number" class="form-control border-0 bg-light rounded-3" value="2025">
                            </div>
                            <div class="col-md-2 d-grid">
                                <button class="btn btn-outline-primary premium-btn w-100"><i class="ri ri-add-line"></i> Add</button>
                            </div>
                        </form>
                        <table class="table table-bordered text-center premium-table">
                            <thead>
                                <tr>
                                    <th><i class="ri ri-map-pin-line"></i> State</th>
                                    <th><i class="ri ri-building-line"></i> City</th>
                                    <th><i class="ri ri-calendar-event-line"></i> Date</th>
                                    <th><i class="ri ri-flag-2-line"></i> Holiday</th>
                                    <th><i class="ri ri-calendar-2-line"></i> Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MH</td>
                                    <td>Mumbai</td>
                                    <td>28 Aug</td>
                                    <td>Ganesh Chaturthi</td>
                                    <td>2025</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-secondary premium-btn"><i class="ri ri-save-3-line"></i> Save</button>
                            <button class="btn btn-success premium-btn"><i class="ri ri-send-plane-line"></i> Publish</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HR Mapping Tab -->
            <div class="tab-pane fade" id="hrMapping">
                <div class="row">
                    <div class="col-md-6">
                        <div class="premium-card">
                            <div class="card-header premium-gradient">
                                <h5 class="mb-0"><i class="ri ri-user-settings-line"></i> HR Mapping & Auto-Fill</h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <strong>HR Mapping:</strong><br>
                                    1) HR maps regional holidays, comp offs, or special leaves<br>
                                    2) Auto-fills 8 hrs in Pulse Log for current week<br>
                                    Status: absence_mapped, pending, approved
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="premium-card">
                            <div class="card-header premium-gradient">
                                <h5 class="mb-0"><i class="ri ri-megaphone-line"></i> Buzz Desk : HR Publishing Panel</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Alert Type</label>
                                        <select class="form-select">
                                            <option>Mandate</option>
                                            <option>Holiday</option>
                                            <option>General</option>
                                            <option>Event</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="Eg - Diwali Holiday announced">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Attachment</label>
                                        <input type="file" class="form-control" accept=".pdf,.jpg,.png,.doc,.docx">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Target Audience</label>
                                        <select class="form-select" multiple>
                                            <option>All</option>
                                            <option>Department</option>
                                            <option>Team</option>
                                            <option>Region</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Visibility Dates</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="date" class="form-control" placeholder="From">
                                            </div>
                                            <div class="col-6">
                                                <input type="date" class="form-control" placeholder="To">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Publish to Buzz Feed</button>
                                </form>
                                <small class="text-muted mt-2 d-block">Every alert logged by timeStamp, HR ID, HR Name, Designation.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
