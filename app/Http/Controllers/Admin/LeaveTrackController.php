<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeaveTrack;
use Illuminate\Http\Request;

class LeaveTrackController extends Controller
{
    public function index(Request $request)
    {
        $query = LeaveTrack::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('employee_id', 'like', "%$search%")
                  ->orWhere('leave_type', 'like', "%$search%");
            });
        }

        // Leave type filter
        if ($request->filled('leave_type')) {
            $query->where('leave_type', $request->input('leave_type'));
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
        $leaves = $query->paginate(15)->appends($request->query());
        return view('admin.leave-track.index', compact('leaves'));
    }

    public function create()
    {
        return view('admin.leave-track.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer',
            'leave_type' => 'required|in:sick,casual,earned,unpaid',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);

        $validated['status'] = 'pending';
        LeaveTrack::create($validated);
        return redirect('admin/leave-track')->with('success', 'Leave request created');
    }

    public function show($id)
    {
        $leave = LeaveTrack::findOrFail($id);
        return view('admin.leave-track.show', compact('leave'));
    }

    public function edit($id)
    {
        $leave = LeaveTrack::findOrFail($id);
        return view('admin.leave-track.edit', compact('leave'));
    }

    public function update(Request $request, $id)
    {
        $leave = LeaveTrack::findOrFail($id);
        $leave->update($request->all());
        return redirect('admin/leave-track')->with('success', 'Leave request updated');
    }

    public function destroy($id)
    {
        LeaveTrack::findOrFail($id)->delete();
        return redirect('admin/leave-track')->with('success', 'Leave request deleted');
    }
}
