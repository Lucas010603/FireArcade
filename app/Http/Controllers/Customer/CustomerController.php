<?php

namespace app\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customerportal.new');
    }
}
