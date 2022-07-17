<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function save(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|max:10|unique:users',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:14',
        ]);

        //Registering new user
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return back()->with('register-success', 'Successfully registered, please login.');
        } else {
            return back()->with('register-fail', 'Something went wrong, please try again later.');
        }
    }
}
