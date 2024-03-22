<?php

namespace App\Http\Controllers\mechanic;

use App\Http\Controllers\Controller;

class mechanicController extends Controller
{
    public function index()
    {


        return view('mechanic.index');
    }
}
