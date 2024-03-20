<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct()
    {

    }

    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('sales.customer.index');
        }
        return view("login");
    }

    public function attemptLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            return redirect()->route('sales.customer.index');
        } else {
            return redirect()->back()->withErrors(['login_error' => 'E-mail of wachtwoord is onjuist.']);
        }
    }

    public function signOut()
    {
        Auth::logout();
    }

}
