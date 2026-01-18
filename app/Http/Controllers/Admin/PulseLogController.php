<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PulseLog;
use Illuminate\Http\Request;

class PulseLogController extends Controller
{
    public function index(Request $request)
    {
        $query = PulseLog::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('action', 'like', "%$search%")->orWhere('description', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $pulse_logs = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.pulse-log.index', compact('pulse_logs'));
    }

    public function create()
    {
        return view('admin.pulse-log.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
            'check_in_time' => 'required|date_format:H:i',
            'check_out_time' => 'nullable|date_format:H:i',
            'duration_hours' => 'nullable|numeric|min:0',
            'status' => 'required|in:present,absent,late,on_leave',
        ]);

        $validated['is_active'] = true;
        PulseLog::create($validated);

        return redirect('admin/pulse-log')->with('success', 'Attendance record created successfully.');
    }

    public function edit($id)
    {
        $pulse_log = PulseLog::findOrFail($id);
        return view('admin.pulse-log.edit', compact('pulse_log'));
    }

    public function update(Request $request, $id)
    {
        $pulse_log = PulseLog::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
            'check_in_time' => 'required|date_format:H:i',
            'check_out_time' => 'nullable|date_format:H:i',
            'duration_hours' => 'nullable|numeric|min:0',
            'status' => 'required|in:present,absent,late,on_leave',
        ]);

        $pulse_log->update($validated);

        return redirect('admin/pulse-log')->with('success', 'Attendance record updated successfully.');
    }

    public function show($id)
    {
        $pulse_log = PulseLog::findOrFail($id);
        return view('admin.pulse-log.show', compact('pulse_log'));
    }

    public function destroy($id)
    {
        $pulse_log = PulseLog::findOrFail($id);
        $pulse_log->delete();

        return redirect('admin/pulse-log')->with('success', 'Attendance record deleted successfully.');
    }
}
