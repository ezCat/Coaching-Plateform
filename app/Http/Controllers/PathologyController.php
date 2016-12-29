<?php

namespace App\Http\Controllers;

use App\Pathology;

class PathologyController extends Controller
{
    public function index()
    {
        return Pathology::all();
    }
}
