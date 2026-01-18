<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index(Request $request)
    {
        $query = JobPosting::query();
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
        $jobs = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.job-postings.index', compact('jobs'));
    }

    public function create()
    {
        $departments = \App\Models\Department::where('is_active', true)->orderBy('name')->get();
        return view('admin.job-postings.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string',
            'department' => 'required|string',
            'status' => 'required|in:open,closed,filled',
            'applicants_count' => 'required|integer',
            'description' => 'nullable|string',
            'job_type' => 'nullable|string',
            'location' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        JobPosting::create($validated);
        return redirect('/admin/job-postings')->with('success', 'Job posting created successfully');
    }

    public function edit(JobPosting $job)
    {
        $departments = \App\Models\Department::where('is_active', true)->orderBy('name')->get();
        return view('admin.job-postings.edit', compact('job', 'departments'));
    }

    public function update(Request $request, JobPosting $job)
    {
        $validated = $request->validate([
            'job_title' => 'required|string',
            'department' => 'required|string',
            'status' => 'required|in:open,closed,filled',
            'applicants_count' => 'required|integer',
            'description' => 'nullable|string',
            'job_type' => 'nullable|string',
            'location' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $job->update($validated);
        return redirect('/admin/job-postings')->with('success', 'Job posting updated successfully');
    }

    public function destroy(JobPosting $job)
    {
        $job->delete();
        return redirect('/admin/job-postings')->with('success', 'Job posting deleted successfully');
    }
}
