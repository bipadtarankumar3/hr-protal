@extends('admin.layouts.app')

@section('content')



<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">


        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 20px; border-radius: 10px; color: white;">
            <div>
                <h4 class="fw-semibold mb-1">Buzz Desk</h4>
                <p class="text-muted mb-0" style="color: rgba(255,255,255,0.8);">
                    Company announcements, holidays & updates
                </p>
            </div>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#publishAnnouncementModal">
                <i class="ri ri-add-line"></i> Publish Announcement
            </button>
        </div>

        <div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
        <!-- Tabs -->
        <ul class="nav nav-pills mb-4">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#announcements">
                    Announcements
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#holidays">
                    Holidays
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#payslips">
                    Payslips
                </button>
            </li>
        </ul>

        <div class="tab-content">

            <!-- Announcements -->
            <div class="tab-pane fade show active" id="announcements">
                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="card shadow-sm border-0" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" alt="HR Avatar" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                                        <div>
                                            <h6 class="fw-semibold mb-1">
                                                New Attendance Policy
                                            </h6>
                                            <small style="color: rgba(255,255,255,0.8);">
                                                HR • 05 May 2025
                                            </small>
                                        </div>
                                    </div>
                                    <span class="badge bg-light text-dark">Mandate</span>
                                </div>
                                <p class="mt-3 mb-0">
                                    From May 6th, attendance must be submitted before
                                    10 AM the following working day.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card shadow-sm border-0" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" alt="HR Avatar" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                                        <div>
                                            <h6 class="fw-semibold mb-1">
                                                Diwali Holiday Announced
                                            </h6>
                                            <small style="color: rgba(255,255,255,0.8);">
                                                HR • 01 Oct 2025
                                            </small>
                                        </div>
                                    </div>
                                    <span class="badge bg-light text-dark">Holiday</span>
                                </div>
                                <p class="mt-3 mb-0">
                                    Office will remain closed on 20th October
                                    on account of Diwali.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Holidays -->
            <div class="tab-pane fade" id="holidays">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Upcoming Holidays</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Holiday</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>15 Aug 2025</td>
                                    <td>Independence Day</td>
                                    <td>
                                        <span class="badge bg-primary">National</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>28 Aug 2025</td>
                                    <td>Ganesh Chaturthi</td>
                                    <td>
                                        <span class="badge bg-warning">Regional</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payslips -->
            <div class="tab-pane fade" id="payslips">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3 align-items-end">

                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <select class="form-select">
                                    <option>2025</option>
                                    <option>2024</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select class="form-select">
                                    <option>September</option>
                                    <option>August</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary w-100">
                                    Download Payslip
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        </div>
        </div>
    </div>
</div>


<!-- Publish Announcement Modal -->
<div class="modal fade" id="publishAnnouncementModal" tabindex="-1" aria-labelledby="publishAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="publishAnnouncementModalLabel">Publish Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="announcementTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="announcementTitle" placeholder="Enter announcement title">
                    </div>
                    <div class="mb-3">
                        <label for="announcementType" class="form-label">Type</label>
                        <select class="form-select" id="announcementType">
                            <option value="announcement">Announcement</option>
                            <option value="holiday">Holiday</option>
                            <option value="mandate">Mandate</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="announcementDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="announcementDate">
                    </div>
                    <div class="mb-3">
                        <label for="announcementContent" class="form-label">Content</label>
                        <textarea class="form-control" id="announcementContent" rows="4" placeholder="Enter announcement details"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Publish</button>
            </div>
        </div>
    </div>
</div>


@endsection
