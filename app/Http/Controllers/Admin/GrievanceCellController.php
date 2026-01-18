<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrievanceCell;
use Illuminate\Http\Request;

class GrievanceCellController extends Controller
{
    public function index(Request $request)
    {
        $query = GrievanceCell::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('subject', 'like', "%$search%")->orWhere('description', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $grievance_cells = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.grievance-cell.index', compact('grievance_cells'));
    }

    public function create()
    {
        return view('admin.grievance-cell.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'grievance_type' => 'required|string|max:100',
            'description' => 'required|string',
            'severity' => 'required|in:low,medium,high',
            'assigned_to' => 'nullable|integer|exists:users,id',
            'status' => 'required|in:open,in_progress,resolved,closed',
            'resolution' => 'nullable|string',
        ]);

        $validated['is_active'] = true;
        GrievanceCell::create($validated);

        return redirect('admin/grievance-cell')->with('success', 'Grievance created successfully.');
    }

    public function edit($id)
    {
        $grievance = GrievanceCell::findOrFail($id);
        return view('admin.grievance-cell.edit', compact('grievance'));
    }

    public function update(Request $request, $id)
    {
        $grievance = GrievanceCell::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'grievance_type' => 'required|string|max:100',
            'description' => 'required|string',
            'severity' => 'required|in:low,medium,high',
            'assigned_to' => 'nullable|integer|exists:users,id',
            'status' => 'required|in:open,in_progress,resolved,closed',
            'resolution' => 'nullable|string',
        ]);

        $grievance->update($validated);

        return redirect('admin/grievance-cell')->with('success', 'Grievance updated successfully.');
    }

    public function show($id)
    {
        $grievance = GrievanceCell::findOrFail($id);
        return view('admin.grievance-cell.show', compact('grievance'));
    }

    public function destroy($id)
    {
        $grievance = GrievanceCell::findOrFail($id);
        $grievance->delete();

        return redirect('admin/grievance-cell')->with('success', 'Grievance deleted successfully.');
    }
}
