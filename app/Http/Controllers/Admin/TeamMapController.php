<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamMapController extends Controller
{
    //
    public function index(){ return view('admin.team-map.index'); }
    public function show($id) { return view('admin.team-map.show'); }
    public function edit($id) { return view('admin.team-map.edit'); }
}
