@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 20px; border-radius: 10px; color: white;">
            <div>
                <h4 class="fw-semibold mb-1">OffBoard Desk</h4>
                <p class="text-muted mb-0" style="color: rgba(255,255,255,0.8);">
                    Manage resignations, clearances & final settlements
                </p>
            </div>
            <a href="{{ route('offboard-desks.create') }}" class="btn btn-light">
                <i class="ri-add-line me-1"></i>New Offboard
            </a>
        </div>

<!-- Resignation Queue Filters -->
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-filter-3-line me-2"></i>Filters</h6>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('offboard-desks.index') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by employee name" value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary w-100">
                    <i class="ri ri-filter-3-line me-1"></i> Apply Filters
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Resignation Queue -->
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-list-check me-2"></i>Resignation Queue</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Employee Name</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($off_board_desks as $offboard)
                        <tr>
                            <td>{{ $offboard->employee_name }}</td>
                            <td>{{ Str::limit($offboard->reason, 40) }}</td>
                            <td>
                                @if($offboard->status == 'pending')
                                    <span class="badge bg-warning">Pending Approval</span>
                                @elseif($offboard->status == 'approved')
                                    <span class="badge bg-info">Approved</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                            <td>{{ $offboard->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('offboard-desks.show', $offboard->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="ri-eye-line"></i> View
                                </a>
                                <a href="{{ route('offboard-desks.edit', $offboard->id) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="ri-edit-line"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="ri-inbox-line me-2"></i>No offboard requests found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="w-100 mt-3">
    {{ $off_board_desks->links() }}
</div>


        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <strong>Employee:</strong> Amit Das (EMP-001)
            </div>
            <div class="col-md-6">
                <strong>Last Working Day:</strong> 30 Sep 2025
            </div>
        </div>

        <div class="accordion" id="exitChecklistAccordion">
            <!-- Manager Clearance -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. Manager Clearance
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="managerClearance">
                            <label class="form-check-label" for="managerClearance">
                                Verified by [Project Manager]
                            </label>
                        </div>
                        <textarea class="form-control" rows="2" placeholder="Add comments..."></textarea>
                    </div>
                </div>
            </div>

            <!-- HR Clearance -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. HR Clearance
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="hrClearance">
                            <label class="form-check-label" for="hrClearance">
                                Verified by [HR Manager]
                            </label>
                        </div>
                        <textarea class="form-control" rows="2" placeholder="Add comments..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Finance Clearance -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Finance Clearance
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="financeClearance">
                            <label class="form-check-label" for="financeClearance">
                                Verified by [Finance HR]
                            </label>
                        </div>
                        <textarea class="form-control" rows="2" placeholder="Add comments..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Final Settlement Date -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        4. Final Settlement Date
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <input type="date" class="form-control mb-3">
                        <small class="text-muted">Verified by [Finance HR]</small>
                    </div>
                </div>
            </div>

            <!-- Last Month Salary Release Date -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        5. Last Month Salary Release Date
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <input type="date" class="form-control mb-3">
                        <small class="text-muted">Verified by [Finance HR]</small>
                    </div>
                </div>
            </div>

            <!-- Relieving Letter Status -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        6. Relieving Letter Status
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <select class="form-select mb-3">
                            <option>Not Issued</option>
                            <option>Issued</option>
                        </select>
                        <small class="text-muted">Verified by [HR Manager]</small>
                    </div>
                </div>
            </div>

            <!-- Experience Letter Status -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        7. Experience Letter Status
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#exitChecklistAccordion">
                    <div class="accordion-body">
                        <select class="form-select mb-3">
                            <option>Not Issued</option>
                            <option>Issued</option>
                        </select>
                        <small class="text-muted">Verified by [HR Manager]</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4 gap-2">
            <button class="btn btn-outline-secondary">
                <i class="ri-save-line me-1"></i>Save Progress
            </button>
            <button class="btn btn-success">
                <i class="ri-check-double-line me-1"></i>Complete Exit
            </button>
        </div>

    </div>
</div>

<!-- Notifications -->
<div class="card shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="ri-notification-line me-2"></i>Notifications</h6>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <strong>Resignation Submitted:</strong> Trigger (Employee) → Recipient (HR + Manager)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-success">
                    <strong>LWD Confirmed:</strong> Trigger (HR) → Recipient (Employee)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-warning">
                    <strong>Final Settlement Scheduled:</strong> Trigger (Finance HR) → Recipient (HR)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-primary">
                    <strong>Pay Slip (Final):</strong> Trigger (Finance HR) → Recipient (HR)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-secondary">
                    <strong>Relieving Letter:</strong> Trigger (Finance HR) → Recipient (HR)
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-dark">
                    <strong>Experience Letter:</strong> Trigger (Finance HR) → Recipient (HR)
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
