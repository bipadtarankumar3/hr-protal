@extends('admin.layouts.app')

@section('content')



 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-6">
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-semibold mb-1">Pay Pulse</h4>
        <p class="text-muted mb-0">
            Monthly payroll processing & payslip generation
        </p>
    </div>
    {{-- <a href="{{ route('pay-pulses.create') }}" class="btn btn-primary">
        <i class="ri-add-line me-1"></i>New Payroll
    </a> --}}
</div>

<!-- Filter Form -->
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <form method="GET" action="{{ route('pay-pulses.index') }}" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by employee ID or payroll month" value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processed" {{ request('status') == 'processed' ? 'selected' : '' }}>Processed</option>
                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
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

<!-- Employee Payroll Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Employee ID</th>
                        <th>Payroll Month</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($payPulses as $payroll)
                        <tr>
                            <td>{{ $payroll->employee_id }}</td>
                            <td>{{ $payroll->payroll_month }}</td>
                            <td>
                                @if($payroll->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($payroll->status == 'processed')
                                    <span class="badge bg-info">Processed</span>
                                @else
                                    <span class="badge bg-success">Paid</span>
                                @endif
                            </td>
                            <td>{{ $payroll->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('pay-pulses.show', $payroll->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="ri-eye-line"></i>
                                </a>
                                <a href="{{ route('pay-pulses.edit', $payroll->id) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="ri-edit-line"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="ri-inbox-line me-2"></i>No payroll records found
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
    {{ $payPulses->links() }}
</div>
</div>
</div>

@endsection
