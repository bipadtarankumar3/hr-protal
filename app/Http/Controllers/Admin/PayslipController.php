<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payslip;
use Illuminate\Http\Request;

class PayslipController extends Controller
{
    public function index(Request $request)
    {
        $query = Payslip::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('employee_id', 'like', "%$search%");
        }

        // Month filter
        if ($request->filled('month')) {
            $query->where('month', $request->input('month'));
        }

        // Year filter
        if ($request->filled('year')) {
            $query->where('year', $request->input('year'));
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Sorting
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $payslips = $query->paginate(15)->appends($request->query());
        return view('admin.payslips.index', compact('payslips'));
    }

    public function create()
    {
        return view('admin.payslips.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'month' => 'required|string|max:10',
            'year' => 'required|integer|min:2020',
            'basic_salary' => 'required|numeric|min:0',
            'gross_salary' => 'required|numeric|min:0',
            'net_salary' => 'required|numeric|min:0',
            'deductions' => 'nullable|numeric|min:0',
            'allowances' => 'nullable|numeric|min:0',
        ]);

        $validated['is_active'] = true;
        Payslip::create($validated);

        return redirect('admin/payslips')->with('success', 'Payslip created successfully.');
    }

    public function generate()
    {
        return view('admin.payslips.generate');
    }

    public function show($id)
    {
        $payslip = Payslip::findOrFail($id);
        return view('admin.payslips.show', compact('payslip'));
    }

    public function edit($id)
    {
        $payslip = Payslip::findOrFail($id);
        return view('admin.payslips.edit', compact('payslip'));
    }

    public function update(Request $request, $id)
    {
        $payslip = Payslip::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'month' => 'required|string|max:10',
            'year' => 'required|integer|min:2020',
            'basic_salary' => 'required|numeric|min:0',
            'gross_salary' => 'required|numeric|min:0',
            'net_salary' => 'required|numeric|min:0',
            'deductions' => 'nullable|numeric|min:0',
            'allowances' => 'nullable|numeric|min:0',
        ]);

        $payslip->update($validated);

        return redirect('admin/payslips')->with('success', 'Payslip updated successfully.');
    }

    public function destroy($id)
    {
        $payslip = Payslip::findOrFail($id);
        $payslip->delete();

        return redirect('admin/payslips')->with('success', 'Payslip deleted successfully.');
    }
}
