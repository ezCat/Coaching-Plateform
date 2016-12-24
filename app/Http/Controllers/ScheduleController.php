<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return Schedule::all();
    }

    public function store(Request $request)
    {
        $schedule = new Schedule;
        $schedule->date_match = $request->date_match;
        $schedule->club_id = $request->club_id;
        $schedule->team_id = $request->team_id;
        $schedule->place_id = $request->place_id;

        if ($schedule->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Schedule::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->date_match = $request->date_match;
        $schedule->club_id = $request->club_id;
        $schedule->team_id = $request->team_id;
        $schedule->place_id = $request->place_id;
        if ($schedule->save()) return 'OK';
        return "Nope";
    }

    public function destroy(Request $request)
    {
        if (Schedule::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
