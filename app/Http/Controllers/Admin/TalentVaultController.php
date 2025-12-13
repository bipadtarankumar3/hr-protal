<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TalentVaultController extends Controller
{
    //
    public function index(){ return view('admin.talent-vault.index'); }
    public function show($id) { return view('admin.talent-vault.show'); }
    public function create() { return view('admin.talent-vault.create'); }
    public function edit($id) { return view('admin.talent-vault.edit'); }
}
