<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditTrail;
use Illuminate\Http\Request;

class AuditTrailController extends Controller
{
    public function index(Request $request)
    {
        $query = AuditTrail::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('action', 'like', "%$search%")->orWhere('target_model', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $audit_trails = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.audit-trail.index', compact('audit_trails'));
    }

    public function create()
    {
        return view('admin.audit-trail.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'action' => 'required|string|max:255',
            'description' => 'nullable|string',
            'changes' => 'nullable|string',
            'ip_address' => 'nullable|string|max:45',
        ]);

        $validated['is_active'] = true;
        AuditTrail::create($validated);

        return redirect('admin/audit-trail')->with('success', 'Audit trail entry created successfully.');
    }

    public function edit($id)
    {
        $audit_trail = AuditTrail::findOrFail($id);
        return view('admin.audit-trail.edit', compact('audit_trail'));
    }

    public function update(Request $request, $id)
    {
        $audit_trail = AuditTrail::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'action' => 'required|string|max:255',
            'description' => 'nullable|string',
            'changes' => 'nullable|string',
            'ip_address' => 'nullable|string|max:45',
        ]);

        $audit_trail->update($validated);

        return redirect('admin/audit-trail')->with('success', 'Audit trail entry updated successfully.');
    }

    public function show($id)
    {
        $audit_trail = AuditTrail::findOrFail($id);
        return view('admin.audit-trail.show', compact('audit_trail'));
    }

    public function destroy($id)
    {
        $audit_trail = AuditTrail::findOrFail($id);
        $audit_trail->delete();

        return redirect('admin/audit-trail')->with('success', 'Audit trail entry deleted successfully.');
    }
}
