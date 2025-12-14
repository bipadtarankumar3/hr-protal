<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PayslipController extends Controller
{
    public function index()
    {
        return view('admin.payslips.index');
    }

    public function generate()
    {
        return view('admin.payslips.generate');
    }

    public function show($id)
    {
        return view('admin.payslips.show', ['id' => $id]);
    }
}
