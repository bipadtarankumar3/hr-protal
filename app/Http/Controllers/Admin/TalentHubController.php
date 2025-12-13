<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TalentHubController extends Controller
{
    public function index() { return view('admin.talent-hub.index'); }
    public function create() { return view('admin.talent-hub.create'); }
    public function applicants() { return view('admin.talent-hub.applicants'); }
    public function edit($id) { return view('admin.talent-hub.edit', ['id' => $id]); }
    public function show($id) { return view('admin.talent-hub.show', ['id' => $id]); }
}
