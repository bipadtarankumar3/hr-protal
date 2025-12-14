<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AuditTrailController extends Controller
{
    public function index()
    {
        return view('admin.audit-trail.index');
    }

    public function show($id)
    {
        return view('admin.audit-trail.show', ['id' => $id]);
    }
}
