<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeAway;
use Illuminate\Http\Request;

class TimeAwayController extends Controller
{
    public function index(Request $request)
    {
        $query = TimeAway::query();
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
        $time_aways = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.time-away.index', compact('time_aways'));
    }

    public function create()
    {
        return view('admin.time-away.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
            'type' => 'required|in:vacation,sick_leave,personal,other',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $validated['is_active'] = true;
        TimeAway::create($validated);

        return redirect('admin/time-away')->with('success', 'Time away entry created successfully.');
    }

    public function edit($id)
    {
        $time_away = TimeAway::findOrFail($id);
        return view('admin.time-away.edit', compact('time_away'));
    }

    public function update(Request $request, $id)
    {
        $time_away = TimeAway::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
            'type' => 'required|in:vacation,sick_leave,personal,other',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $time_away->update($validated);

        return redirect('admin/time-away')->with('success', 'Time away entry updated successfully.');
    }

    public function show($id)
    {
        $time_away = TimeAway::findOrFail($id);
        return view('admin.time-away.show', compact('time_away'));
    }

    public function destroy($id)
    {
        $time_away = TimeAway::findOrFail($id);
        $time_away->delete();

        return redirect('admin/time-away')->with('success', 'Time away entry deleted successfully.');
    }
}
