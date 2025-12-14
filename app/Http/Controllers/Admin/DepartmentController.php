<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.departments.index');
    }
    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        // UI-only demo: in real app, validate and persist to DB
        session()->flash('status', 'Department created (demo)');
        return Redirect::to('/admin/departments');
    }

    public function edit($id)
    {
        return view('admin.departments.edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        session()->flash('status', "Department #{$id} updated (demo)");
        return Redirect::to('/admin/departments');
    }

    public function destroy($id)
    {
        session()->flash('status', "Department #{$id} deleted (demo)");
        return Redirect::to('/admin/departments');
    }

    public function show($id)
    {
        return view('admin.departments.show', ['id' => $id]);
    }
}
