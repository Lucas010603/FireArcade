<?php

namespace App\Http\Controllers\mechanic;

use App\Http\Controllers\Controller;

class contractController extends Controller
{
    public function index()
    {


        return view('mechanic.contract.index');
    }
}
