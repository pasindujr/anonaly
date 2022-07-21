<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function giveFeedback($username)
    {
        $userData = User::select('id', 'name', 'user_image_path')
            ->where('username', $username)
            ->first();

        return view('feedback.givefeedback', compact('userData', 'username'));
    }

    public function saveFeedback(Request $request)
    {


        $feedback = new Feedback;

        $feedback->user_id = $request->user_id;
        $feedback->username = $request->username;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return back();

    }
}
