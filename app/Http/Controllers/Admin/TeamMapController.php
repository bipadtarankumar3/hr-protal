<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMap;
use Illuminate\Http\Request;

class TeamMapController extends Controller
{
    public function index(Request $request)
    {
        $query = TeamMap::with(['department', 'teamLead']);
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('team_name', 'like', "%$search%")
                  ->orWhere('focus_area', 'like', "%$search%")
                  ->orWhereHas('department', function($q) use ($search) {
                      $q->where('name', 'like', "%$search%");
                  });
            });
        }
        
        // Status filter
        if ($request->filled('is_active')) {
            $is_active = $request->input('is_active') === 'true' ? 1 : 0;
            $query->where('is_active', $is_active);
        }
        
        // Department filter
        if ($request->filled('department_id')) {
            $query->where('department_id', $request->input('department_id'));
        }
        
        // Sorting
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);
        
        $team_maps = $query->paginate(15)->appends($request->query());
        $departments = \App\Models\Department::where('is_active', true)->orderBy('name')->get();
        $users = \App\Models\User::where('is_active', true)->orderBy('name')->get();
        
        return view('admin.team-map.index', compact('team_maps', 'departments', 'users'));
    }

    public function create()
    {
        $departments = \App\Models\Department::where('is_active', true)->orderBy('name')->get();
        $users = \App\Models\User::where('is_active', true)->orderBy('name')->get();
        
        if (request()->ajax()) {
            return view('admin.team-map.create-form', compact('departments', 'users'))->render();
        }
        
        return view('admin.team-map.create', compact('departments', 'users'));
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
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : true;
        $team_map = TeamMap::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Team mapping created successfully.',
                'team_map' => $team_map->load(['department', 'teamLead'])
            ]);
        }

        return redirect()->route('team-maps.index')->with('success', 'Team mapping created successfully.');
    }

    public function edit($id)
    {
        $team_map = TeamMap::findOrFail($id);
        $departments = \App\Models\Department::where('is_active', true)->orderBy('name')->get();
        $users = \App\Models\User::where('is_active', true)->orderBy('name')->get();
        
        if (request()->ajax()) {
            return view('admin.team-map.edit-form', compact('team_map', 'departments', 'users'))->render();
        }
        
        return view('admin.team-map.edit', compact('team_map', 'departments', 'users'));
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
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $team_map->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Team mapping updated successfully.',
                'team_map' => $team_map->load(['department', 'teamLead'])
            ]);
        }

        return redirect()->route('team-maps.index')->with('success', 'Team mapping updated successfully.');
    }

    public function show($id)
    {
        $team_map = TeamMap::with(['department', 'teamLead'])->findOrFail($id);
        
        if (request()->ajax()) {
            return view('admin.team-map.view-content', compact('team_map'))->render();
        }
        
        return view('admin.team-map.show', compact('team_map'));
    }

    public function destroy($id)
    {
        $team_map = TeamMap::findOrFail($id);
        $team_map->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Team mapping deleted successfully.'
            ]);
        }

        return redirect()->route('team-maps.index')->with('success', 'Team mapping deleted successfully.');
    }
}
