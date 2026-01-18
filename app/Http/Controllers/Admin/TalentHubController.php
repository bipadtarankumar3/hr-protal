<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TalentHub;
use Illuminate\Http\Request;

class TalentHubController extends Controller
{
    public function index(Request $request)
    {
        $query = TalentHub::where('is_active', true);
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('skills', 'like', "%$search%")
                  ->orWhere('department', 'like', "%$search%");
            });
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        
        // Experience level filter
        if ($request->filled('experience_level')) {
            $query->where('experience_level', $request->input('experience_level'));
        }
        
        // Sort
        $sortBy = $request->input('sort_by', 'applied_date');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);
        
        $talents = $query->paginate(15)->appends($request->query());
        return view('admin.talent-hub.index', compact('talents'));
    }

    public function create()
    {
        return view('admin.talent-hub.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_id' => 'required|integer',
            'candidate_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $validated['status'] = 'applied';
        TalentHub::create($validated);
        return redirect('admin/talent-hub')->with('success', 'Candidate added');
    }

    public function applicants()
    {
        $applicants = TalentHub::where('status', 'applied')->get();
        return view('admin.talent-hub.applicants', compact('applicants'));
    }

    public function show($id)
    {
        $talent = TalentHub::findOrFail($id);
        return view('admin.talent-hub.show', compact('talent'));
    }

    public function edit($id)
    {
        $talent = TalentHub::findOrFail($id);
        return view('admin.talent-hub.edit', compact('talent'));
    }

    public function update(Request $request, $id)
    {
        $talent = TalentHub::findOrFail($id);
        $talent->update($request->all());
        return redirect('admin/talent-hub')->with('success', 'Candidate updated');
    }

    public function destroy($id)
    {
        TalentHub::findOrFail($id)->delete();
        return redirect('admin/talent-hub')->with('success', 'Candidate removed');
    }
}
