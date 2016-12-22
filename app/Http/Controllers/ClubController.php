<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        return Club::all();
    }

    public function store(Request $request)
    {
        $club = new Club;
        $club->name = $request->name;
        $club->main_color = $request->main_color;
        $club->gym_id = $request->gym_id;

        if ($club->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Club::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $club = Club::find($request->id);
        $club->name = $request->name;
        $club->main_color = $request->main_color;
        $club->gym_id = $request->gym_id;
        $club->save();
    }

    public function destroy(Request $request)
    {
        if (Club::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
