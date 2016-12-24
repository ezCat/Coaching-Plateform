<?php

namespace App\Http\Controllers;

use App\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index()
    {
        return Reminder::all();
    }

    public function store(Request $request)
    {
        $reminder = new Reminder;
        $reminder->title = $request->title;
        $reminder->day = $request->day;
        $reminder->icon = $request->icon;
        $reminder->description = $request->description;
        $reminder->color = $request->color;
        $reminder->team_id = $request->team_id;

        if ($reminder->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Reminder::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $reminder = Reminder::find($request->id);
        $reminder->title = $request->title;
        $reminder->day = $request->day;
        $reminder->icon = $request->icon;
        $reminder->description = $request->description;
        $reminder->color = $request->color;
        $reminder->team_id = $request->team_id;
        if ($reminder->save()) return "OK";
        return "Nope";
    }

    public function destroy(Request $request)
    {
        if (Reminder::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
