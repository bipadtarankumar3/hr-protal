<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMap;
use Illuminate\Http\Request;

class TeamMapController extends Controller
{
    public function index(Request $request)
    {
        $query = TeamMap::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('project_name', 'like', "%$search%")->orWhere('team_name', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $team_maps = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.team-map.index', compact('team_maps'));
    }

    public function create()
    {
        return view('admin.team-map.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id' => 'required|integer|exists:departments,id',
            'team_name' => 'required|string|max:255',
            'team_lead_id' => 'required|integer|exists:users,id',
            'member_count' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'focus_area' => 'nullable|string|max:255',
        ]);

        $validated['is_active'] = true;
        TeamMap::create($validated);

        return redirect('admin/team-map')->with('success', 'Team mapping created successfully.');
    }

    public function edit($id)
    {
        $team_map = TeamMap::findOrFail($id);
        return view('admin.team-map.edit', compact('team_map'));
    }

    public function update(Request $request, $id)
    {
        $team_map = TeamMap::findOrFail($id);
        $validated = $request->validate([
            'department_id' => 'required|integer|exists:departments,id',
            'team_name' => 'required|string|max:255',
            'team_lead_id' => 'required|integer|exists:users,id',
            'member_count' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'focus_area' => 'nullable|string|max:255',
        ]);

        $team_map->update($validated);

        return redirect('admin/team-map')->with('success', 'Team mapping updated successfully.');
    }

    public function show($id)
    {
        $team_map = TeamMap::findOrFail($id);
        return view('admin.team-map.show', compact('team_map'));
    }

    public function destroy($id)
    {
        $team_map = TeamMap::findOrFail($id);
        $team_map->delete();

        return redirect('admin/team-map')->with('success', 'Team mapping deleted successfully.');
    }
}
