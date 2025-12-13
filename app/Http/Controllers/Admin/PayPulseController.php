<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayPulseController extends Controller
{
    //
    public function index(){ return view('admin.pay-pulse.index'); }
    public function show($id) { return view('admin.pay-pulse.show'); }
    public function edit($id) { return view('admin.pay-pulse.edit'); }
}
