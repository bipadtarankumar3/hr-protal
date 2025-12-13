<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HireDeskController extends Controller
{
    //
    public function index(){ return view('admin.hire-desk.index'); }
    public function offer(){ return view('admin.hire-desk.offer'); }
}
