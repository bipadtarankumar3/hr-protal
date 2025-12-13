<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearnZoneController extends Controller
{
    //
    public function index(){ return view('admin.learn-zone.index'); }
    public function show($id) { return view('admin.learn-zone.show'); }
    public function create() { return view('admin.learn-zone.create'); }
    public function edit($id) { return view('admin.learn-zone.edit'); }
}
