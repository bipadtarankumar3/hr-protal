<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $query = Feature::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")->orWhere('description', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $features = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'feature_name' => 'required|string',
            'icon_class' => 'nullable|string',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        Feature::create($validated);
        return redirect('/admin/features')->with('success', 'Feature created successfully');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'feature_name' => 'required|string',
            'icon_class' => 'nullable|string',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $feature->update($validated);
        return redirect('/admin/features')->with('success', 'Feature updated successfully');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect('/admin/features')->with('success', 'Feature deleted successfully');
    }
}
