<?php

namespace app\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users');
    }
}