<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearnZone;
use Illuminate\Http\Request;

class LearnZoneController extends Controller
{
    public function index(Request $request)
    {
        $query = LearnZone::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('course_name', 'like', "%$search%")->orWhere('description', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $learn_zones = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.learn-zone.index', compact('learn_zones'));
    }

    public function create()
    {
        return view('admin.learn-zone.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_type' => 'required|string|max:100',
            'instructor' => 'nullable|string|max:255',
            'duration_hours' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:100',
        ]);

        $validated['is_active'] = true;
        LearnZone::create($validated);

        return redirect('admin/learn-zone')->with('success', 'Learning content created successfully.');
    }

    public function edit($id)
    {
        $learn_zone = LearnZone::findOrFail($id);
        return view('admin.learn-zone.edit', compact('learn_zone'));
    }

    public function update(Request $request, $id)
    {
        $learn_zone = LearnZone::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_type' => 'required|string|max:100',
            'instructor' => 'nullable|string|max:255',
            'duration_hours' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:100',
        ]);

        $learn_zone->update($validated);

        return redirect('admin/learn-zone')->with('success', 'Learning content updated successfully.');
    }

    public function show($id)
    {
        $learn_zone = LearnZone::findOrFail($id);
        return view('admin.learn-zone.show', compact('learn_zone'));
    }

    public function destroy($id)
    {
        $learn_zone = LearnZone::findOrFail($id);
        $learn_zone->delete();

        return redirect('admin/learn-zone')->with('success', 'Learning content deleted successfully.');
    }
}
