<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PulseLogController extends Controller
{
    //
    public function index(){ return view('admin.pulse-log.index'); }
    public function show($id) { return view('admin.pulse-log.show'); }
    public function edit($id) { return view('admin.pulse-log.edit'); }
}
