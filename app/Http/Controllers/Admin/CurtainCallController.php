<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurtainCallController extends Controller
{
    //
    public function index(){ return view('admin.curtain-call.index'); }
    public function resign() { return view('admin.curtain-call.resign'); }
    public function show($id) { return view('admin.curtain-call.show'); }
    public function edit($id) { return view('admin.curtain-call.edit'); }
}
