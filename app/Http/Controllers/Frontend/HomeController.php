<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\PageContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    
    public function index() {
        $features = Feature::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        $heroContent = PageContent::where('page_name', 'home')
            ->where('section_name', 'hero')
            ->where('is_active', true)
            ->first();
        
        return view('frontend.home', compact('features', 'heroContent'));
    }
    
    public function login() {
        // Redirect if already authenticated
        if (auth()->check()) {
            return redirect()->intended('/admin');
        }
        
        return view('frontend.login');
    }
}
