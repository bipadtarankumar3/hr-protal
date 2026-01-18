<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OffBoardDesk;
use Illuminate\Http\Request;

class OffBoardDeskController extends Controller
{
    public function index(Request $request)
    {
        $query = OffBoardDesk::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('employee_name', 'like', "%$search%")->orWhere('reason', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $off_board_desks = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.offboard-desk.index', compact('off_board_desks'));
    }

    public function create()
    {
        return view('admin.offboard-desk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'exit_date' => 'required|date',
            'reason' => 'nullable|string',
            'checklist_status' => 'required|string|max:100',
            'documents_returned' => 'boolean',
            'final_settlement' => 'boolean',
            'reference_provided' => 'nullable|boolean',
        ]);

        $validated['is_active'] = true;
        OffBoardDesk::create($validated);

        return redirect('admin/offboard-desk')->with('success', 'Offboarding entry created successfully.');
    }

    public function edit($id)
    {
        $offboard_desk = OffBoardDesk::findOrFail($id);
        return view('admin.offboard-desk.edit', compact('offboard_desk'));
    }

    public function update(Request $request, $id)
    {
        $offboard_desk = OffBoardDesk::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'exit_date' => 'required|date',
            'reason' => 'nullable|string',
            'checklist_status' => 'required|string|max:100',
            'documents_returned' => 'boolean',
            'final_settlement' => 'boolean',
            'reference_provided' => 'nullable|boolean',
        ]);

        $offboard_desk->update($validated);

        return redirect('admin/offboard-desk')->with('success', 'Offboarding entry updated successfully.');
    }

    public function show($id)
    {
        $offboard_desk = OffBoardDesk::findOrFail($id);
        return view('admin.offboard-desk.show', compact('offboard_desk'));
    }

    public function destroy($id)
    {
        $offboard_desk = OffBoardDesk::findOrFail($id);
        $offboard_desk->delete();

        return redirect('admin/offboard-desk')->with('success', 'Offboarding entry deleted successfully.');
    }
}
