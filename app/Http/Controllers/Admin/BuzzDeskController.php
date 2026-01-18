<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BuzzDesk;
use Illuminate\Http\Request;

class BuzzDeskController extends Controller
{
    public function index(Request $request)
    {
        $query = BuzzDesk::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('subject', 'like', "%$search%")->orWhere('description', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $buzz_desks = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.buzz-desk.index', compact('buzz_desks'));
    }

    public function create()
    {
        return view('admin.buzz-desk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'posted_by' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);

        $validated['is_active'] = true;
        BuzzDesk::create($validated);

        return redirect('admin/buzz-desk')->with('success', 'News/announcement created successfully.');
    }

    public function edit($id)
    {
        $buzz_desk = BuzzDesk::findOrFail($id);
        return view('admin.buzz-desk.edit', compact('buzz_desk'));
    }

    public function update(Request $request, $id)
    {
        $buzz_desk = BuzzDesk::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'posted_by' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);

        $buzz_desk->update($validated);

        return redirect('admin/buzz-desk')->with('success', 'News/announcement updated successfully.');
    }

    public function show($id)
    {
        $buzz_desk = BuzzDesk::findOrFail($id);
        return view('admin.buzz-desk.show', compact('buzz_desk'));
    }

    public function destroy($id)
    {
        $buzz_desk = BuzzDesk::findOrFail($id);
        $buzz_desk->delete();

        return redirect('admin/buzz-desk')->with('success', 'News/announcement deleted successfully.');
    }
}
