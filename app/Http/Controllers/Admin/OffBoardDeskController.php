<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OffBoardDeskController extends Controller
{
    //
    public function index(){ return view('admin.offboard-desk.index'); }
    public function show($id) { return view('admin.offboard-desk.show'); }
    public function edit($id) { return view('admin.offboard-desk.edit'); }
}
