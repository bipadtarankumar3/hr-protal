<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Department::where('is_active', true);
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('code', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }
        
        // Code filter
        if ($request->filled('code')) {
            $query->where('code', $request->input('code'));
        }
        
        // Sort
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);
        
        $departments = $query->paginate(15)->appends($request->query());
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        $users = \App\Models\User::orderBy('name')->get();
        return view('admin.departments.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'code' => 'required|string|max:50|unique:departments,code',
            'description' => 'nullable|string',
            'head_id' => 'nullable|integer|exists:users,id',
            'budget' => 'nullable|numeric|min:0',
        ]);

        $validated['is_active'] = true;
        Department::create($validated);

        return Redirect::to('/admin/departments')->with('success', 'Department created successfully.');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $users = \App\Models\User::orderBy('name')->get();
        return view('admin.departments.edit', compact('department', 'users'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $id,
            'code' => 'required|string|max:50|unique:departments,code,' . $id,
            'description' => 'nullable|string',
            'head_id' => 'nullable|integer|exists:users,id',
            'budget' => 'nullable|numeric|min:0',
        ]);

        $department->update($validated);

        return Redirect::to('/admin/departments')->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return Redirect::to('/admin/departments')->with('success', 'Department deleted successfully.');
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.show', compact('department'));
    }
}
