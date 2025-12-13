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
            <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#newEntryModal">
                <i class="ri ri-add-line me-1"></i> New Entry
            </button>
        </div>
        <!-- Week Selector -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <form class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label"><i class="ri ri-calendar-event-line me-1"></i>Week</label>
                        <select class="form-select">
                            <option>Current Week (01 Sep – 07 Sep)</option>
                            <option>Previous Week (25 Aug – 31 Aug)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><i class="ri ri-folder-3-line me-1"></i>Project Code</label>
                        <select class="form-select">
                            <option>RYDZAA-TECH-002</option>
                            <option>RYDZAA-OPS-001</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><i class="ri ri-edit-2-line me-1"></i>Entry Type</label>
                        <select class="form-select">
                            <option>Manual</option>
                            <option>Auto (Leave/Holiday)</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-grid">
                        <button class="btn btn-outline-primary">
                            <i class="ri ri-refresh-line"></i> Load Attendance
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Attendance Grid -->
        <div class="card border-0 shadow">
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
