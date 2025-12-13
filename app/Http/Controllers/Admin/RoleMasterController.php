<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleMasterController extends Controller
{
    //
    public function index(){ return view('admin.role-master.index'); }
    public function show($id) { return view('admin.role-master.show'); }
    public function create() { return view('admin.role-master.create'); }
    public function edit($id) { return view('admin.role-master.edit'); }
}
