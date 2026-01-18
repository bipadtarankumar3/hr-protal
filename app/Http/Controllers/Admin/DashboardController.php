<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DashboardMetric;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $metrics = DashboardMetric::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        $jobPostings = JobPosting::where('is_active', true)
            ->where('status', 'open')
            ->orderBy('sort_order')
            ->get();
        
        return view('admin.dashboard.index', compact('metrics', 'jobPostings'));
    }
}
