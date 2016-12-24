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
        $calendar->title = $request->title;
        $calendar->description = $request->description;
        $calendar->begun_at = $request->begun_at;
        $calendar->finished_at = $request->name;
        $calendar->location = $request->location;
        $calendar->calendar_type_id = $request->calendar_type_id;
        $calendar->team_id = $request->team_id;
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
        $calendar->title = $request->title;
        $calendar->description = $request->description;
        $calendar->begun_at = $request->begun_at;
        $calendar->finished_at = $request->name;
        $calendar->location = $request->location;
        $calendar->calendar_type_id = $request->calendar_type_id;
        $calendar->team_id = $request->team_id;
        if ($calendar->save()) return "OK";
        return "Nope";
    }

    public function destroy(Request $request)
    {
        if (Calendar::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
