<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
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

        $userFeedbacks = DB::table('feedbacks')
            ->select('feedback', 'created_at')
            ->where('user_id', '=', session('loggedUser'))
            ->paginate(8);

        $feedbackCount = DB::table('feedbacks')
            ->select('feedback', '=', session('loggedUser'))
            ->count();

        return view('user.account', compact('userData', 'feedbackCount', 'userFeedbacks'));
    }
}
