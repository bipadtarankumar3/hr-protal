<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuzzDeskController extends Controller
{
    //
    public function index(){ return view('admin.buzz-desk.index'); }
    public function show($id) { return view('admin.buzz-desk.show'); }
    public function create() { return view('admin.buzz-desk.create'); }
    public function edit($id) { return view('admin.buzz-desk.edit'); }
}
