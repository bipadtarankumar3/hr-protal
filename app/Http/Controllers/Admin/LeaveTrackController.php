<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveTrackController extends Controller
{
    //
    public function index(){ return view('admin.leave-track.index'); }
    public function show($id) { return view('admin.leave-track.show'); }
    public function create() { return view('admin.leave-track.create'); }
    public function edit($id) { return view('admin.leave-track.edit'); }
}
