<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnboardProController extends Controller
{
    //
    public function index(){ return view('admin.onboard-pro.index'); }
    public function show($id) { return view('admin.onboard-pro.show'); }
    public function edit($id) { return view('admin.onboard-pro.edit'); }
}
