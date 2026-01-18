<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $query = Team::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
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
        $teams = $query->paginate(15)->appends($request->query());
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:teams,name',
            'description' => 'nullable|string',
            'manager_id' => 'nullable|integer|exists:users,id',
            'department_id' => 'nullable|integer|exists:departments,id',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $validated['is_active'] = true;
        Team::create($validated);

        return Redirect::to('/admin/teams')->with('success', 'Team created successfully.');
    }

    public function edit($team)
    {
        $team = Team::findOrFail($team);
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, $team)
    {
        $team = Team::findOrFail($team);
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:teams,name,' . $team->id,
            'description' => 'nullable|string',
            'manager_id' => 'nullable|integer|exists:users,id',
            'department_id' => 'nullable|integer|exists:departments,id',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $team->update($validated);

        return Redirect::to('/admin/teams')->with('success', 'Team updated successfully.');
    }

    public function destroy($team)
    {
        $team = Team::findOrFail($team);
        $team->delete();

        return Redirect::to('/admin/teams')->with('success', 'Team deleted successfully.');
    }

    public function show($team)
    {
        $team = Team::findOrFail($team);
        return view('admin.teams.show', compact('team'));
    }
}
