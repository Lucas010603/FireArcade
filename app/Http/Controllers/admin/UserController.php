<?php

namespace app\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\User;
use App\Models\admin\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('active', 1)->with('role')->get();
        return view('admin.user', compact('users'));
    }

    public function new()
    {
        $users = User::where('active', 1)->get();
        $roles = UserRole::get();
        return view('admin.user-new', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:user',
            'name' => 'required',
            'password' => 'required|confirmed',
            'role_id' => 'required'
        ],[
            'email.required' => 'vul een email in',
            'email.email' => 'ingevoerde email is voldoet niet aan de email standaard',
            'email.unique' => 'de ingevoerde email bestaat al',
            'name.required' => 'vul een naam in',
            'password.required' => 'bevestig het wachtwoord',
            'password.confirmed' => 'bevestig het wachtwoord',
            'role_id.required' => 'Selecteer een rol'
        ]);

        if ($request->has('password')) {
            $data['password'] = Hash::make($data['password']);
            unset($data['password_confirmation']);
        }

        User::insert($data);
        return redirect()->route('adminportal');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = UserRole::get();
        return view("admin.user-edit", compact('user', 'roles'));
    }

    public function update($id, Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email',
                'name' => 'required',
                'role_id' => 'required'
            ],[
                'email.required' => 'vul een email in',
                'email.email' => 'ingevoerde email is voldoet niet aan de email standaard',
                'name.required' => 'vul een naam in',
                'role_id.required' => 'Selecteer een rol'
            ]
        );

        $user = User::find($id);
        $user->update($data);

        return redirect()->route('adminportal');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->update(["active" => 0]);
        return response()->json($user);
    }
}
