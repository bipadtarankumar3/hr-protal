<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleMaster;
use Illuminate\Http\Request;

class RoleMasterController extends Controller
{
    public function index(Request $request)
    {
        $query = RoleMaster::query();

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
        $role_masters = $query->paginate(15)->appends($request->query());
        return view('admin.role-master.index', compact('role_masters'));
    }

    public function create()
    {
        return view('admin.role-master.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:role_masters,name',
            'code' => 'required|string|max:50|unique:role_masters,code',
            'description' => 'nullable|string',
            'permissions' => 'nullable|string',
            'salary_grade' => 'nullable|string|max:50',
        ]);

        $validated['is_active'] = true;
        RoleMaster::create($validated);

        return redirect('admin/role-master')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role_master = RoleMaster::findOrFail($id);
        return view('admin.role-master.edit', compact('role_master'));
    }

    public function update(Request $request, $id)
    {
        $role_master = RoleMaster::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:role_masters,name,' . $id,
            'code' => 'required|string|max:50|unique:role_masters,code,' . $id,
            'description' => 'nullable|string',
            'permissions' => 'nullable|string',
            'salary_grade' => 'nullable|string|max:50',
        ]);

        $role_master->update($validated);

        return redirect('admin/role-master')->with('success', 'Role updated successfully.');
    }

    public function show($id)
    {
        $role_master = RoleMaster::findOrFail($id);
        return view('admin.role-master.show', compact('role_master'));
    }

    public function destroy($id)
    {
        $role_master = RoleMaster::findOrFail($id);
        $role_master->delete();

        return redirect('admin/role-master')->with('success', 'Role deleted successfully.');
    }
}
