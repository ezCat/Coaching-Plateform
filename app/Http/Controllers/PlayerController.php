<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        return Player::all();
    }

    public function store(Request $request)
    {
        $player = new Player;
        $player->last_name = $request->last_name;
        $player->first_name = $request->first_name;
        $player->birth_date = $request->birth_date;
        $player->position = $request->position;
        $player->experience = $request->experience;

        if ($player->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Player::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $player = Player::find($request->id);
        $player->last_name = $request->last_name;
        $player->first_name = $request->first_name;
        $player->birth_date = $request->birth_date;
        $player->position = $request->position;
        $player->experience = $request->experience;
        if ($player->save()) return "OK";
        return "Nope";
    }

    public function destroy(Request $request)
    {
        if (Player::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
