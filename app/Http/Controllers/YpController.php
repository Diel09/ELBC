<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class YpController extends Controller
{
    public function add()
    {
        return Inertia::render('YP/Add');
    }
}
