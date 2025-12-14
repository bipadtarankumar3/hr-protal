<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    public function index()
    {
        return view('admin.teams.index');
    }
    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        session()->flash('status', 'Team created (demo)');
        return Redirect::to('/admin/teams');
    }

    public function edit($team)
    {
        return view('admin.teams.edit', ['team' => $team]);
    }

    public function update(Request $request, $team)
    {
        session()->flash('status', "Team {$team} updated (demo)");
        return Redirect::to('/admin/teams');
    }

    public function destroy($team)
    {
        session()->flash('status', "Team {$team} deleted (demo)");
        return Redirect::to('/admin/teams');
    }

    public function show($team)
    {
        return view('admin.teams.show', ['team' => $team]);
    }
}
