@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1"><i class="ri ri-money-rupee-circle-line me-2"></i>Payslips</h4>
      <p class="text-muted">List of payslips and generation tools (demo).</p>
    </div>
    <a href="{{ url('/admin/payslips/generate') }}" class="btn btn-primary">Generate Payslips</a>
  </div>

  <!-- Filter Section -->
  <div class="card mb-4 bg-light">
    <div class="card-body">
      <form method="GET" action="{{ route('payslips.index') }}" class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Search <small class="text-muted">(Employee ID)</small></label>
          <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
          <label class="form-label">Month</label>
          <input type="text" name="month" class="form-control" placeholder="MM/YYYY" value="{{ request('month') }}">
        </div>
        <div class="col-md-2">
          <label class="form-label">Status</label>
          <select name="status" class="form-select">
            <option value="">All</option>
            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>Paid</option>
          </select>
        </div>
        <div class="col-md-3 d-flex align-items-end gap-2">
          <button type="submit" class="btn btn-primary w-100">
            <i class="ri-filter-3-line"></i> Apply Filters
          </button>
          <a href="{{ route('payslips.index') }}" class="btn btn-outline-secondary">
            <i class="ri-refresh-line"></i> Reset
          </a>
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Employee ID</th>
              <th>Month</th>
              <th>Basic Salary</th>
              <th>Gross Salary</th>
              <th>Net Salary</th>
              <th>Status</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($payslips as $payslip)
            <tr>
              <td><strong>#{{ $payslip->employee_id }}</strong></td>
              <td>{{ $payslip->month ?? 'N/A' }}</td>
              <td>${{ number_format($payslip->basic_salary ?? 0, 2) }}</td>
              <td>${{ number_format($payslip->gross_salary ?? 0, 2) }}</td>
              <td>${{ number_format($payslip->net_salary ?? 0, 2) }}</td>
              <td>
                <span class="badge bg-{{ ['draft' => 'secondary', 'approved' => 'success', 'paid' => 'info', 'rejected' => 'danger'][$payslip->status] ?? 'secondary' }}">
                  {{ ucfirst($payslip->status ?? 'N/A') }}
                </span>
              </td>
              <td class="text-end">
                <a href="{{ route('payslips.show', $payslip->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                <a href="{{ route('payslips.edit', $payslip->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center py-4 text-muted">No payslips found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $payslips->links() }}
  </div>
</div>
@endsection
