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
</div>

<!-- Payroll Controls -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3 align-items-end">

            <div class="col-md-3">
                <label class="form-label">Payroll Month</label>
                <select class="form-select">
                    <option>September 2025</option>
                    <option>August 2025</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Cut-off Date</label>
                <input type="text" class="form-control" value="25 Sep 2025" disabled>
            </div>

            <div class="col-md-3">
                <label class="form-label">Payroll Status</label>
                <span class="badge bg-warning d-block text-center p-2">
                    Pending Processing
                </span>
            </div>

            <div class="col-md-3">
                <button class="btn btn-primary w-100">
                    <i class="ri ri-play-circle-line"></i> Run Payroll
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Payroll Summary -->
<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Total Employees</h6>
                <h4 class="fw-semibold mb-0">45</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Paid Leaves</h6>
                <h4 class="fw-semibold mb-0">120</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>LOP Days</h6>
                <h4 class="fw-semibold mb-0">8</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Total Payroll</h6>
                <h4 class="fw-semibold mb-0">₹ 28,50,000</h4>
            </div>
        </div>
    </div>

</div>

<!-- Employee Payroll Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Project Code</th>
                        <th>Working Days</th>
                        <th>LOP</th>
                        <th>Net Pay</th>
                        <th>Payslip</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>EMP-001</td>
                        <td>Amit Das</td>
                        <td>RYDZAA-TECH-002</td>
                        <td>22</td>
                        <td>0</td>
                        <td>₹ 55,000</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">
                                Generate
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>EMP-002</td>
                        <td>Neha Verma</td>
                        <td>RYDZAA-OPS-001</td>
                        <td>20</td>
                        <td>2</td>
                        <td>₹ 42,000</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">
                                Generate
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>EMP-003</td>
                        <td>Rohit Sharma</td>
                        <td>RYDZAA-TECH-002</td>
                        <td>22</td>
                        <td>0</td>
                        <td>₹ 85,000</td>
                        <td>
                            <span class="badge bg-success">
                                Generated
                            </span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Payroll Notes -->
<div class="alert alert-info mt-4">
    <i class="ri ri-information-line"></i>
    Payroll is calculated based on Pulse Log attendance up to
    <strong>25th of the month</strong>. Payslips are generated on the
    <strong>last working day</strong>.
</div>
</div>
</div>

@endsection
