<?php

namespace App\Http\Controllers;

use App\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        return Gym::all();
    }

    public function store(Request $request)
    {
        $gym = new Gym;
        $gym->name = $request->name;
        $gym->adress = $request->adress;
        $gym->location = $request->location;

        if ($gym->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Gym::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $gym = Gym::find($request->id);
        $gym->name = $request->name;
        $gym->adress = $request->adress;
        $gym->location = $request->location;
        $gym->save();
    }

    public function destroy(Request $request)
    {
        if (Gym::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
