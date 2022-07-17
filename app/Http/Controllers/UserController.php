<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account()
    {

        $userData = User::where('userid', '=', session('loggedUser'))
            ->first();

        return view('user.account', compact('userData'));
    }
}
