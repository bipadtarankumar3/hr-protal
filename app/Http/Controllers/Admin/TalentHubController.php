<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TalentHub;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class TalentHubController extends Controller
{
    public function index(Request $request)
    {
        $query = TalentHub::query();
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('skills', 'like', "%$search%")
                  ->orWhere('department', 'like', "%$search%");
            });
        }
        
        // Department filter
        if ($request->filled('department_id')) {
            $query->where('department_id', $request->input('department_id'));
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        
        // Experience level filter
        if ($request->filled('experience_level')) {
            $query->where('experience_level', $request->input('experience_level'));
        }
        
        // Status filter (is_active)
        if ($request->filled('is_active')) {
            $is_active = $request->input('is_active') === 'true' ? 1 : 0;
            $query->where('is_active', $is_active);
        }
        
        // Sort
        $sortBy = $request->input('sort_by', 'applied_date');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);
        
        $talents = $query->with(['employee', 'departmentRelation'])->paginate(15)->appends($request->query());
        $departments = Department::where('is_active', true)->orderBy('name')->get();
        
        return view('admin.talent-hub.index', compact('talents', 'departments'));
    }

    public function create()
    {
        $departments = Department::where('is_active', true)->orderBy('name')->get();
        
        return view('admin.talent-hub.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'skills' => 'nullable|string|max:255',
            'experience_level' => 'nullable|string|in:junior,mid,senior,lead',
            'department' => 'required|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'location' => 'nullable|string|max:255',
            'career_path' => 'nullable|string|max:255',
            'applied_date' => 'nullable|date',
            'status' => 'nullable|string|in:active,inactive,pending,closed',
            'notes' => 'nullable|string',
            'application_limit' => 'nullable|integer|min:0',
            'hiring_manager' => 'nullable|string|max:255',
            'project' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['status'] = $validated['status'] ?? 'pending';
        $validated['is_active'] = $request->has('is_active') ? true : true; // Default to active
        
        // If department is selected, try to find department_id
        if (!empty($validated['department']) && empty($validated['department_id'])) {
            $department = Department::where('name', $validated['department'])->first();
            if ($department) {
                $validated['department_id'] = $department->id;
            }
        }
        
        TalentHub::create($validated);
        
        return redirect()->route('talent-hubs.index')->with('success', 'Job created successfully.');
    }

    public function show($id)
    {
        $talent = TalentHub::with(['employee', 'departmentRelation'])->findOrFail($id);
        return view('admin.talent-hub.show', compact('talent'));
    }

    public function edit($id)
    {
        $talent = TalentHub::findOrFail($id);
        $departments = Department::where('is_active', true)->orderBy('name')->get();
        
        return view('admin.talent-hub.edit', compact('talent', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $talent = TalentHub::findOrFail($id);
        
        $validated = $request->validate([
            'employee_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'skills' => 'nullable|string|max:255',
            'experience_level' => 'nullable|string|in:junior,mid,senior,lead',
            'department' => 'required|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'location' => 'nullable|string|max:255',
            'career_path' => 'nullable|string|max:255',
            'applied_date' => 'nullable|date',
            'status' => 'nullable|string|in:active,inactive,pending,closed',
            'notes' => 'nullable|string',
            'application_limit' => 'nullable|integer|min:0',
            'hiring_manager' => 'nullable|string|max:255',
            'project' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : true;
        
        // If department is selected, try to find department_id
        if (!empty($validated['department']) && empty($validated['department_id'])) {
            $department = Department::where('name', $validated['department'])->first();
            if ($department) {
                $validated['department_id'] = $department->id;
            }
        }
        
        $talent->update($validated);
        
        return redirect()->route('talent-hubs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        $talent = TalentHub::findOrFail($id);
        $talent->delete();
        
        return redirect()->route('talent-hubs.index')->with('success', 'Talent removed successfully.');
    }

    public function applicants()
    {
        $applicants = TalentHub::where('status', 'applied')->with(['employee', 'departmentRelation'])->get();
        return view('admin.talent-hub.applicants', compact('applicants'));
    }
}
