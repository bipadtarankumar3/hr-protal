<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HireDesk;
use Illuminate\Http\Request;

class HireDeskController extends Controller
{
    public function index(Request $request)
    {
        $query = HireDesk::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('job_title', 'like', "%$search%")
                  ->orWhere('department', 'like', "%$search%");
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
        $hire_desks = $query->paginate(15)->appends($request->query());
        return view('admin.hire-desk.index', compact('hire_desks'));
    }

    public function create()
    {
        return view('admin.hire-desk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'vacancy_count' => 'required|integer|min:1',
            'status' => 'required|in:open,ongoing,closed',
            'opening_date' => 'required|date',
            'closing_date' => 'nullable|date|after_or_equal:opening_date',
            'description' => 'nullable|string',
        ]);

        $validated['is_active'] = true;
        HireDesk::create($validated);

        return redirect('admin/hire-desk')->with('success', 'Hiring entry created successfully.');
    }

    public function edit($id)
    {
        $hire_desk = HireDesk::findOrFail($id);
        return view('admin.hire-desk.edit', compact('hire_desk'));
    }

    public function update(Request $request, $id)
    {
        $hire_desk = HireDesk::findOrFail($id);
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'vacancy_count' => 'required|integer|min:1',
            'status' => 'required|in:open,ongoing,closed',
            'opening_date' => 'required|date',
            'closing_date' => 'nullable|date|after_or_equal:opening_date',
            'description' => 'nullable|string',
        ]);

        $hire_desk->update($validated);

        return redirect('admin/hire-desk')->with('success', 'Hiring entry updated successfully.');
    }

    public function show($id)
    {
        $hire_desk = HireDesk::findOrFail($id);
        return view('admin.hire-desk.show', compact('hire_desk'));
    }

    public function destroy($id)
    {
        $hire_desk = HireDesk::findOrFail($id);
        $hire_desk->delete();

        return redirect('admin/hire-desk')->with('success', 'Hiring entry deleted successfully.');
    }
}
