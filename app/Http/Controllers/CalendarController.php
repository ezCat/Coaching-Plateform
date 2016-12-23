<?php

namespace App\Http\Controllers;

use App\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return Calendar::all();
    }

    public function store(Request $request)
    {
        $calendar = new Calendar;
        $calendar->name = $request->name;

        if ($calendar->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Calendar::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $calendar = Calendar::find($request->id);
        $calendar->name = $request->name;
        $calendar->save();
    }

    public function destroy(Request $request)
    {
        if (Calendar::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
