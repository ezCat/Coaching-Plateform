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
        $reminder->name = $request->name;
        $reminder->weekly_date = $request->weekly_date;
        $reminder->icon = $request->icon;
        $reminder->content = $request->content;
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
        $reminder->name = $request->name;
        $reminder->weekly_date = $request->weekly_date;
        $reminder->icon = $request->icon;
        $reminder->content = $request->content;
        $reminder->team_id = $request->team_id;
        $reminder->save();
    }

    public function destroy(Request $request)
    {
        if (Reminder::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}