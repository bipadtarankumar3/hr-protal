<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function index()
    {
        $pages = PageContent::where('is_active', true)
            ->orderBy('page_name')
            ->orderBy('sort_order')
            ->get();
        return view('admin.page-content.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page-content.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string',
            'section_name' => 'required|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('pages', 'public');
        }

        PageContent::create($validated);
        return redirect('/admin/page-content')->with('success', 'Content created successfully');
    }

    public function edit(PageContent $page)
    {
        return view('admin.page-content.edit', compact('page'));
    }

    public function update(Request $request, PageContent $page)
    {
        $validated = $request->validate([
            'page_name' => 'required|string',
            'section_name' => 'required|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('pages', 'public');
        }

        $page->update($validated);
        return redirect('/admin/page-content')->with('success', 'Content updated successfully');
    }

    public function destroy(PageContent $page)
    {
        $page->delete();
        return redirect('/admin/page-content')->with('success', 'Content deleted successfully');
    }
}
