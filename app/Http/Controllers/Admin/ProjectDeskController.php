<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectDesk;
use Illuminate\Http\Request;

class ProjectDeskController extends Controller
{
    public function index(Request $request)
    {
        $query = ProjectDesk::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('project_name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
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
        $project_desks = $query->paginate(15)->appends($request->query());
        return view('admin.project-desk.index', compact('project_desks'));
    }

    public function create()
    {
        return view('admin.project-desk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'manager_id' => 'required|integer|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:planning,active,completed,on_hold',
            'budget' => 'nullable|numeric|min:0',
        ]);

        $validated['is_active'] = true;
        ProjectDesk::create($validated);

        return redirect('admin/project-desk')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project_desk = ProjectDesk::findOrFail($id);
        return view('admin.project-desk.edit', compact('project_desk'));
    }

    public function update(Request $request, $id)
    {
        $project_desk = ProjectDesk::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'manager_id' => 'required|integer|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:planning,active,completed,on_hold',
            'budget' => 'nullable|numeric|min:0',
        ]);

        $project_desk->update($validated);

        return redirect('admin/project-desk')->with('success', 'Project updated successfully.');
    }

    public function show($id)
    {
        $project_desk = ProjectDesk::findOrFail($id);
        return view('admin.project-desk.show', compact('project_desk'));
    }

    public function destroy($id)
    {
        $project_desk = ProjectDesk::findOrFail($id);
        $project_desk->delete();

        return redirect('admin/project-desk')->with('success', 'Project deleted successfully.');
    }
}
