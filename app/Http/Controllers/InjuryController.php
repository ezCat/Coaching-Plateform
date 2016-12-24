<?php

namespace App\Http\Controllers;

use App\Injury;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
    public function index()
    {
        return Injury::all();
    }

    public function store(Request $request)
    {
        $injury = new Injury;
        $injury->date_injury = $request->date_injury;
        $injury->date_recover_injury = $request->date_recover_injury;
        $injury->player_id = $request->player_id;
        $injury->team_id = $request->team_id;
        $injury->pathology_id = $request->pathology_id;

        if ($injury->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Injury::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $injury = Injury::find($request->id);
        $injury->date_injury = $request->date_injury;
        $injury->date_recover_injury = $request->date_recover_injury;
        $injury->player_id = $request->player_id;
        $injury->team_id = $request->team_id;
        $injury->pathology_id = $request->pathology_id;
        if ($injury->save()) return "OK";
        return "Nope";
    }

    public function destroy(Request $request)
    {
        if (Injury::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
