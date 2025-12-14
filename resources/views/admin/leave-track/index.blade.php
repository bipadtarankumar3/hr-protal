@extends('admin.layouts.app')

@section('content')
<style>
    /* Premium UI Enhancements */
    .premium-gradient {
        background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
        color: #fff;
    }
    .premium-card {
        border-radius: 1.25rem;
        box-shadow: 0 4px 24px rgba(106,17,203,0.08), 0 1.5px 6px rgba(37,117,252,0.08);
        overflow: hidden;
    }
    .premium-table th, .premium-table td {
        vertical-align: middle;
        font-size: 1.05rem;
    }
    .premium-tabs .nav-link.active {
        background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
        color: #fff !important;
        border-radius: 2rem;
        box-shadow: 0 2px 8px rgba(37,117,252,0.08);
    }
    .premium-tabs .nav-link {
        color: #6a11cb;
        font-weight: 500;
        border-radius: 2rem;
        transition: all 0.2s;
    }
    .premium-tabs .nav-link:not(.active):hover {
        background: #f3f6fd;
        color: #2575fc;
    }
    .premium-badge {
        font-size: 0.95rem;
        padding: 0.4em 1em;
        border-radius: 1rem;
    }
    .premium-btn {
        border-radius: 2rem;
        font-weight: 600;
        padding: 0.5em 1.5em;
        box-shadow: 0 2px 8px rgba(37,117,252,0.08);
    }
    .premium-card-header {
        background: #f3f6fd;
        border-bottom: 1px solid #e3e8f7;
        border-radius: 1.25rem 1.25rem 0 0;
    }
    .premium-table thead {
        background: #f3f6fd;
    }
    .premium-table tbody tr {
        transition: background 0.2s;
    }
    .premium-table tbody tr:hover {
        background: #f7faff;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1 p-3 d-inline-block"><i class="ri ri-calendar-check-line me-2"></i>Leave Track</h4>
                <p class="text-muted mb-0 ms-2">Configure leave types, quotas & holidays</p>
            </div>
        </div>
        <!-- Tabs -->
        <ul class="nav nav-pills mb-4 justify-content-center premium-tabs">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#leaveTypes">
                    <i class="ri ri-list-check-2"></i> Leave Configuration
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nationalHolidays">
                    <i class="ri ri-flag-2-line"></i> National Holidays
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#regionalHolidays">
                    <i class="ri ri-map-pin-line"></i> Regional Holidays
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#hrMapping">
                    <i class="ri ri-user-settings-line"></i> HR Mapping
                </button>
            </li>
        </ul>
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
