<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModuleCard;
use Illuminate\Http\Request;

class ModuleCardController extends Controller
{
    public function index(Request $request)
    {
        $query = ModuleCard::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")->orWhere('description', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $cards = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.module-cards.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.module-cards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_title' => 'required|string',
            'icon_class' => 'nullable|string',
            'description' => 'nullable|string',
            'module_link' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        ModuleCard::create($validated);
        return redirect('/admin/module-cards')->with('success', 'Module card created successfully');
    }

    public function edit(ModuleCard $card)
    {
        return view('admin.module-cards.edit', compact('card'));
    }

    public function update(Request $request, ModuleCard $card)
    {
        $validated = $request->validate([
            'card_title' => 'required|string',
            'icon_class' => 'nullable|string',
            'description' => 'nullable|string',
            'module_link' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $card->update($validated);
        return redirect('/admin/module-cards')->with('success', 'Module card updated successfully');
    }

    public function destroy(ModuleCard $card)
    {
        $card->delete();
        return redirect('/admin/module-cards')->with('success', 'Module card deleted successfully');
    }
}
