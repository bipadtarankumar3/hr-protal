<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class GrievanceCellController extends Controller
{
    public function index()
    {
        return view('admin.grievance-cell.index');
    }

    public function show($id)
    {
        return view('admin.grievance-cell.show', ['id' => $id]);
    }
}
