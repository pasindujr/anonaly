<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function account()
    {

        $userData = DB::table('users')
            ->where('id', '=', session('loggedUser'))
            ->first();

        return view('user.account', compact('userData'));
    }
}
