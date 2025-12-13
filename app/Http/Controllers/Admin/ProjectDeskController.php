<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectDeskController extends Controller
{
    //
    public function index(){ return view('admin.project-desk.index'); }
    public function show($id) { return view('admin.project-desk.show'); }
    public function create() { return view('admin.project-desk.create'); }
    public function edit($id) { return view('admin.project-desk.edit'); }
}
