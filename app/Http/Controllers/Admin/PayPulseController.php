<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayPulse;
use Illuminate\Http\Request;

class PayPulseController extends Controller
{
    public function index(Request $request)
    {
        $query = PayPulse::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('employee_id', 'like', "%$search%");
        }

        // Month filter
        if ($request->filled('month')) {
            $query->where('payroll_month', 'like', '%' . $request->input('month') . '%');
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
        $payPulses = $query->paginate(15)->appends($request->query());
        return view('admin.pay-pulse.index', compact('payPulses'));
    }

    public function create()
    {
        return view('admin.pay-pulse.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer',
            'payroll_month' => 'required|string',
            'basic_salary' => 'required|numeric',
            'allowances' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
        ]);

        $validated['net_salary'] = ($validated['basic_salary'] + ($validated['allowances'] ?? 0)) - ($validated['deductions'] ?? 0);
        $validated['status'] = 'pending';
        PayPulse::create($validated);

        return redirect('admin/pay-pulse')->with('success', 'Payroll entry created successfully');
    }

    public function show($id)
    {
        $payPulse = PayPulse::findOrFail($id);
        return view('admin.pay-pulse.show', compact('payPulse'));
    }

    public function edit($id)
    {
        $payPulse = PayPulse::findOrFail($id);
        return view('admin.pay-pulse.edit', compact('payPulse'));
    }

    public function update(Request $request, $id)
    {
        $payPulse = PayPulse::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer',
            'payroll_month' => 'required|string',
            'basic_salary' => 'required|numeric',
            'allowances' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
        ]);

        $validated['net_salary'] = ($validated['basic_salary'] + ($validated['allowances'] ?? 0)) - ($validated['deductions'] ?? 0);
        $payPulse->update($validated);

        return redirect('admin/pay-pulse')->with('success', 'Payroll entry updated successfully');
    }

    public function destroy($id)
    {
        PayPulse::findOrFail($id)->delete();
        return redirect('admin/pay-pulse')->with('success', 'Payroll entry deleted successfully');
    }
}
