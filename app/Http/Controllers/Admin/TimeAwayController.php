<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeAwayController extends Controller
{
    //
    public function index(){ return view('admin.time-away.index'); }
    public function show($id) { return view('admin.time-away.show'); }
    public function create() { return view('admin.time-away.create'); }
    public function edit($id) { return view('admin.time-away.edit'); }
}
