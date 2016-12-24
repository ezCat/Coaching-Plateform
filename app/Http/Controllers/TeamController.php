<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return Team::all();
    }

    public function store(Request $request)
    {
        $team = new Team;
        $team->name = $request->name;
        $team->category_id = $request->category_id;
        $team->club_id = $request->club_id;

        if ($team->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Team::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $team = Team::find($request->id);
        $team->name = $request->name;
        $team->category_id = $request->category_id;
        $team->club_id = $request->club_id;
        if ($team->save()) return "OK";
        return "Nope";
    }

    public function destroy(Request $request)
    {
        if (Team::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
