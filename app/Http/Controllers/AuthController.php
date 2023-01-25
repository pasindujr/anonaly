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
            'photo' => 'mimes:jpg,png,jpeg|max:5048',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:14',
        ]);

        $userImageName = time() . '-' . $request->username . '.' . $request->photo->extension();

        $request->photo->move(public_path('userimages'), $userImageName);

        //Registering new user
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->gender = $request->gender;
        $user->user_image_path = $userImageName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return back()->with('register-success', 'Successfully registered, please login.');
        } else {
            return back()->with('register-fail', 'Something went wrong, please try again later.');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:14',
        ]);

        $userInfo = User::where('email', '=', $request->email)
            ->first();


        if (!$userInfo) {
            return back()->with('login-fail', 'Sorry, invalid email address');
        } else {
            if (Hash::check($request->password, $userInfo->password) and $userInfo->is_admin == 0) {
                $request->session()->put('loggedUser', $userInfo->id);
                $request->session()->put('isAdmin', 0);
                return redirect('account');

            } elseif (Hash::check($request->password, $userInfo->password) and $userInfo->is_admin == 1) {
                $request->session()->put('loggedUser', $userInfo->id);
                $request->session()->put('isAdmin', 1);
                return redirect('admin');

            } else {
                return back()->with('login-fail', 'Incorrect password');
            }
        }
    }

    public function logout()
    {
            session()->flush();
            return redirect('/login');

    }
}
