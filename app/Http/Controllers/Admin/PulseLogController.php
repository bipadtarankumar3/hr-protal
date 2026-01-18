<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PulseLog;
use App\Models\User;
use App\Models\WeeklyAttendanceNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PulseLogController extends Controller
{
    public function index(Request $request)
    {
        $query = PulseLog::with('employee');
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('employee', function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        
        // Employee filter
        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->input('employee_id'));
        }
        
        // Date filter
        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->input('date_from'));
        }
        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->input('date_to'));
        }
        
        // Status filter (is_active)
        if ($request->filled('is_active')) {
            $is_active = $request->input('is_active') === 'true' ? 1 : 0;
            $query->where('is_active', $is_active);
        }
        
        // Sorting
        $sortBy = $request->input('sort_by', 'date');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);
        
        $pulse_logs = $query->paginate(15)->appends($request->query());
        $employees = User::where('is_active', true)->orderBy('name')->get();
        
        // Get current week data for weekly view
        $weekStart = \Carbon\Carbon::now()->startOfWeek();
        $weekEnd = \Carbon\Carbon::now()->endOfWeek();
        $weekDays = [];
        
        // Get attendance for current week (for selected employee or all if none selected)
        $selectedEmployeeId = $request->input('employee_id');
        $weeklyAttendance = PulseLog::whereBetween('date', [$weekStart, $weekEnd])
            ->when($selectedEmployeeId, function($q) use ($selectedEmployeeId) {
                $q->where('employee_id', $selectedEmployeeId);
            })
            ->get()
            ->keyBy(function($item) {
                return $item->date->format('Y-m-d');
            });
        
        // Generate week days array
        for ($i = 0; $i < 7; $i++) {
            $date = $weekStart->copy()->addDays($i);
            $dateKey = $date->format('Y-m-d');
            $weekDays[] = [
                'date' => $date,
                'dateKey' => $dateKey,
                'dayName' => $date->format('D'),
                'attendance' => $weeklyAttendance->get($dateKey)
            ];
        }
        
        // Get weekly notes for current week
        $weeklyNote = WeeklyAttendanceNote::where('week_start_date', $weekStart->format('Y-m-d'))
            ->where('week_end_date', $weekEnd->format('Y-m-d'))
            ->when($selectedEmployeeId, function($q) use ($selectedEmployeeId) {
                $q->where('employee_id', $selectedEmployeeId);
            })
            ->first();
        
        return view('admin.pulse-log.index', compact('pulse_logs', 'employees', 'weekDays', 'weekStart', 'weekEnd', 'weeklyNote', 'selectedEmployeeId'));
    }

    public function create()
    {
        $employees = User::where('is_active', true)->orderBy('name')->get();
        
        if (request()->ajax()) {
            return view('admin.pulse-log.create-form', compact('employees'))->render();
        }
        
        return view('admin.pulse-log.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
            'check_in_time' => 'required|date_format:H:i',
            'check_out_time' => 'nullable|date_format:H:i',
            'duration_hours' => 'nullable|numeric|min:0|max:24',
            'status' => 'required|in:present,absent,late,on_leave',
            'is_active' => 'nullable|boolean',
        ]);

        // Validate check_out_time is after check_in_time
        if (!empty($validated['check_out_time']) && !empty($validated['check_in_time'])) {
            $checkIn = strtotime($validated['check_in_time']);
            $checkOut = strtotime($validated['check_out_time']);
            if ($checkOut <= $checkIn) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Check out time must be after check in time',
                        'errors' => ['check_out_time' => ['Check out time must be after check in time']]
                    ], 422);
                }
                return redirect()->back()->withErrors(['check_out_time' => 'Check out time must be after check in time'])->withInput();
            }
        }

        $validated['is_active'] = $request->has('is_active') ? true : true;
        
        // Calculate duration if check_out_time is provided
        if (!empty($validated['check_out_time']) && empty($validated['duration_hours'])) {
            try {
                $checkIn = \Carbon\Carbon::parse($validated['date'] . ' ' . $validated['check_in_time']);
                $checkOut = \Carbon\Carbon::parse($validated['date'] . ' ' . $validated['check_out_time']);
                if ($checkOut->greaterThan($checkIn)) {
                    $validated['duration_hours'] = round($checkIn->diffInMinutes($checkOut) / 60, 2);
                }
            } catch (\Exception $e) {
                // If calculation fails, leave duration_hours as is
            }
        }
        
        // Format times properly for database (ensure H:i:s format)
        if (!empty($validated['check_in_time'])) {
            $validated['check_in_time'] = date('H:i:s', strtotime($validated['check_in_time']));
        }
        if (!empty($validated['check_out_time'])) {
            $validated['check_out_time'] = date('H:i:s', strtotime($validated['check_out_time']));
        }
        
        $pulse_log = PulseLog::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Attendance record created successfully.',
                'pulse_log' => $pulse_log->load('employee')
            ]);
        }

        return redirect()->route('pulse-logs.index')->with('success', 'Attendance record created successfully.');
    }

    public function show($id)
    {
        $pulse_log = PulseLog::with('employee')->findOrFail($id);
        
        if (request()->ajax()) {
            return view('admin.pulse-log.view-content', compact('pulse_log'))->render();
        }
        
        return view('admin.pulse-log.show', compact('pulse_log'));
    }

    public function edit($id)
    {
        $pulse_log = PulseLog::findOrFail($id);
        $employees = User::where('is_active', true)->orderBy('name')->get();
        
        if (request()->ajax()) {
            return view('admin.pulse-log.edit-form', compact('pulse_log', 'employees'))->render();
        }
        
        return view('admin.pulse-log.edit', compact('pulse_log', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $pulse_log = PulseLog::findOrFail($id);
        
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
            'check_in_time' => 'required|date_format:H:i',
            'check_out_time' => 'nullable|date_format:H:i',
            'duration_hours' => 'nullable|numeric|min:0|max:24',
            'status' => 'required|in:present,absent,late,on_leave',
            'is_active' => 'nullable|boolean',
        ]);

        // Validate check_out_time is after check_in_time
        if (!empty($validated['check_out_time']) && !empty($validated['check_in_time'])) {
            $checkIn = strtotime($validated['check_in_time']);
            $checkOut = strtotime($validated['check_out_time']);
            if ($checkOut <= $checkIn) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Check out time must be after check in time',
                        'errors' => ['check_out_time' => ['Check out time must be after check in time']]
                    ], 422);
                }
                return redirect()->back()->withErrors(['check_out_time' => 'Check out time must be after check in time'])->withInput();
            }
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;
        
        // Calculate duration if check_out_time is provided
        if (!empty($validated['check_out_time']) && empty($validated['duration_hours'])) {
            try {
                $checkIn = \Carbon\Carbon::parse($validated['date'] . ' ' . $validated['check_in_time']);
                $checkOut = \Carbon\Carbon::parse($validated['date'] . ' ' . $validated['check_out_time']);
                if ($checkOut->greaterThan($checkIn)) {
                    $validated['duration_hours'] = round($checkIn->diffInMinutes($checkOut) / 60, 2);
                }
            } catch (\Exception $e) {
                // If calculation fails, leave duration_hours as is
            }
        }
        
        // Format times properly for database (ensure H:i:s format)
        if (!empty($validated['check_in_time'])) {
            $validated['check_in_time'] = date('H:i:s', strtotime($validated['check_in_time']));
        }
        if (!empty($validated['check_out_time'])) {
            $validated['check_out_time'] = date('H:i:s', strtotime($validated['check_out_time']));
        }
        
        $pulse_log->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Attendance record updated successfully.',
                'pulse_log' => $pulse_log->load('employee')
            ]);
        }

        return redirect()->route('pulse-logs.index')->with('success', 'Attendance record updated successfully.');
    }

    public function destroy($id)
    {
        $pulse_log = PulseLog::findOrFail($id);
        $pulse_log->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Attendance record deleted successfully.'
            ]);
        }

        return redirect()->route('pulse-logs.index')->with('success', 'Attendance record deleted successfully.');
    }

    public function saveWeeklyNotes(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'nullable|integer|exists:users,id',
            'week_start_date' => 'required|date',
            'week_end_date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
        ]);

        $validated['created_by'] = Auth::id();

        $weeklyNote = WeeklyAttendanceNote::updateOrCreate(
            [
                'employee_id' => $validated['employee_id'],
                'week_start_date' => $validated['week_start_date'],
                'week_end_date' => $validated['week_end_date'],
            ],
            [
                'notes' => $validated['notes'],
                'created_by' => $validated['created_by'],
            ]
        );

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Weekly notes saved successfully.',
                'note' => $weeklyNote
            ]);
        }

        return redirect()->back()->with('success', 'Weekly notes saved successfully.');
    }
}
