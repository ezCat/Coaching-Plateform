<?php

namespace App\Http\Controllers;

use App\CalendarType;

class CalendarTypeController extends Controller
{
    public function index()
    {
        return CalendarType::all();
    }
}
