<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurtainCall;
use Illuminate\Http\Request;

class CurtainCallController extends Controller
{
    public function index(Request $request)
    {
        $query = CurtainCall::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('reason', 'like', "%$search%")->orWhere('notes', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $curtain_calls = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.curtain-call.index', compact('curtain_calls'));
    }

    public function create()
    {
        return view('admin.curtain-call.resign');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'resignation_date' => 'required|date',
            'last_working_day' => 'required|date|after_or_equal:resignation_date',
            'reason' => 'nullable|string',
            'exit_interview_date' => 'nullable|date',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $validated['is_active'] = true;
        CurtainCall::create($validated);

        return redirect('admin/curtain-call')->with('success', 'Resignation entry created successfully.');
    }

    public function edit($id)
    {
        $curtain_call = CurtainCall::findOrFail($id);
        return view('admin.curtain-call.edit', compact('curtain_call'));
    }

    public function update(Request $request, $id)
    {
        $curtain_call = CurtainCall::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'resignation_date' => 'required|date',
            'last_working_day' => 'required|date|after_or_equal:resignation_date',
            'reason' => 'nullable|string',
            'exit_interview_date' => 'nullable|date',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $curtain_call->update($validated);

        return redirect('admin/curtain-call')->with('success', 'Resignation entry updated successfully.');
    }

    public function show($id)
    {
        $curtain_call = CurtainCall::findOrFail($id);
        return view('admin.curtain-call.show', compact('curtain_call'));
    }

    public function destroy($id)
    {
        $curtain_call = CurtainCall::findOrFail($id);
        $curtain_call->delete();

        return redirect('admin/curtain-call')->with('success', 'Resignation entry deleted successfully.');
    }
}
