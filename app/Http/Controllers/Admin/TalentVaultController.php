<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TalentVault;
use Illuminate\Http\Request;

class TalentVaultController extends Controller
{
    public function index(Request $request)
    {
        $query = TalentVault::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('candidate_name', 'like', "%$search%")
                  ->orWhere('position_applied', 'like', "%$search%");
            });
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
        $employees = $query->paginate(15)->appends($request->query());
        return view('admin.talent-vault.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.talent-vault.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|unique:talent_vaults',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:talent_vaults',
            'phone' => 'required|string',
            'designation' => 'required|string',
            'department_id' => 'required|integer',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric',
        ]);

        $validated['status'] = 'active';
        TalentVault::create($validated);
        return redirect('admin/talent-vault')->with('success', 'Employee added successfully');
    }

    public function show($id)
    {
        $employee = TalentVault::findOrFail($id);
        return view('admin.talent-vault.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = TalentVault::findOrFail($id);
        return view('admin.talent-vault.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = TalentVault::findOrFail($id);
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:talent_vaults,email,' . $id,
            'phone' => 'required|string',
            'designation' => 'required|string',
            'department_id' => 'required|integer',
            'salary' => 'required|numeric',
        ]);

        $employee->update($validated);
        return redirect('admin/talent-vault')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        TalentVault::findOrFail($id)->delete();
        return redirect('admin/talent-vault')->with('success', 'Employee deleted successfully');
    }
}
