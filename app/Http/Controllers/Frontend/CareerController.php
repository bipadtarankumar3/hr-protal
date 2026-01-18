<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    //
     public function index() {
        $jobs = JobPosting::where('is_active', true)
            ->where('status', 'open')
            ->orderBy('sort_order')
            ->get();
        
        return view('frontend.careers.index', compact('jobs'));
    }
}
