<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnboardPro;
use Illuminate\Http\Request;

class OnboardProController extends Controller
{
    public function index(Request $request)
    {
        $query = OnboardPro::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('employee_name', 'like', "%$search%")->orWhere('department', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $onboard_pros = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.onboard-pro.index', compact('onboard_pros'));
    }

    public function create()
    {
        return view('admin.onboard-pro.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'joining_date' => 'required|date',
            'department' => 'required|string|max:100',
            'mentor_assigned' => 'nullable|string|max:255',
            'checklist_status' => 'required|string|max:100',
            'training_completed' => 'boolean',
            'orientation_done' => 'boolean',
        ]);

        $validated['is_active'] = true;
        OnboardPro::create($validated);

        return redirect('admin/onboard-pro')->with('success', 'Onboarding entry created successfully.');
    }

    public function edit($id)
    {
        $onboard_pro = OnboardPro::findOrFail($id);
        return view('admin.onboard-pro.edit', compact('onboard_pro'));
    }

    public function update(Request $request, $id)
    {
        $onboard_pro = OnboardPro::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'joining_date' => 'required|date',
            'department' => 'required|string|max:100',
            'mentor_assigned' => 'nullable|string|max:255',
            'checklist_status' => 'required|string|max:100',
            'training_completed' => 'boolean',
            'orientation_done' => 'boolean',
        ]);

        $onboard_pro->update($validated);

        return redirect('admin/onboard-pro')->with('success', 'Onboarding entry updated successfully.');
    }

    public function show($id)
    {
        $onboard_pro = OnboardPro::findOrFail($id);
        return view('admin.onboard-pro.show', compact('onboard_pro'));
    }

    public function destroy($id)
    {
        $onboard_pro = OnboardPro::findOrFail($id);
        $onboard_pro->delete();

        return redirect('admin/onboard-pro')->with('success', 'Onboarding entry deleted successfully.');
    }
}
