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
        if ($request->filled('is_active')) {
            $is_active = $request->input('is_active') === 'true' ? 1 : 0;
            $query->where('is_active', $is_active);
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
            'salary_grade' => 'nullable|string|max:50',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['permissions'] = []; // Initialize empty permissions array
        
        RoleMaster::create($validated);

        return redirect()->route('role-masters.index')->with('success', 'Role created successfully.');
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
            'salary_grade' => 'nullable|string|max:50',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        
        $role_master->update($validated);

        return redirect()->route('role-masters.index')->with('success', 'Role updated successfully.');
    }

    public function show($id)
    {
        $role_master = RoleMaster::findOrFail($id);
        // Permissions will be automatically cast to array by the model
        return view('admin.role-master.show', compact('role_master'));
    }

    public function destroy($id)
    {
        $role_master = RoleMaster::findOrFail($id);
        $role_master->delete();

        return redirect()->route('role-masters.index')->with('success', 'Role deleted successfully.');
    }

    /**
     * Show permissions form for a role
     */
    public function showPermissions($id)
    {
        $role_master = RoleMaster::findOrFail($id);
        $modules = $this->getAvailableModules();
        
        // Permissions will be automatically cast to array by the model
        $permissions = $role_master->permissions ?? [];
        if (!is_array($permissions)) {
            $permissions = [];
        }
        
        return view('admin.role-master.permissions', compact('role_master', 'modules', 'permissions'));
    }

    /**
     * Update permissions for a role
     */
    public function updatePermissions(Request $request, $id)
    {
        $role_master = RoleMaster::findOrFail($id);
        
        $validated = $request->validate([
            'permissions' => 'nullable|array',
            'permissions.*' => 'nullable|array',
        ]);

        $permissions = $request->input('permissions', []);
        // Clean up permissions - remove unchecked checkboxes
        foreach ($permissions as $module => $perms) {
            foreach ($perms as $key => $value) {
                if ($value != '1') {
                    unset($permissions[$module][$key]);
                }
            }
        }
        
        // Model will automatically cast array to JSON due to the cast in RoleMaster model
        $role_master->permissions = $permissions;
        $role_master->save();

        return redirect()->route('role-masters.index')->with('success', 'Permissions updated successfully.');
    }

    /**
     * Get available modules for permissions
     */
    private function getAvailableModules()
    {
        return [
            'Talent Hub' => 'talent-hub',
            'Hire Desk' => 'hire-desk',
            'Onboard Pro' => 'onboard-pro',
            'Team Map' => 'team-map',
            'Pulse Log' => 'pulse-log',
            'Time Away' => 'time-away',
            'Leave Track' => 'leave-track',
            'Pay Pulse' => 'pay-pulse',
            'Buzz Desk' => 'buzz-desk',
            'Audit Trail' => 'audit-trail',
            'Role Master' => 'role-master',
            'Department' => 'departments',
            'Team' => 'teams',
            'Talent Vault' => 'talent-vault',
            'Project Desk' => 'project-desk',
            'Off Board Desk' => 'offboard-desk',
            'Curtain Call' => 'curtain-call',
            'Offer Letter' => 'offer-letters',
            'KYC' => 'kyc',
            'Payslip' => 'payslips',
            'Learn Zone' => 'learn-zone',
            'Grievance Cell' => 'grievance-cell',
        ];
    }
}
