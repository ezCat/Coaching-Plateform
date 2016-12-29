<?php

namespace App\Http\Controllers;

use App\Place;

class PlaceController extends Controller
{
    public function index()
    {
        return Place::all();
    }
}
