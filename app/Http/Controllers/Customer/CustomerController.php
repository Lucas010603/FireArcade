<?php

namespace app\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customerportal.new');
    }
}
