<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    public function giveFeedback($username)
    {
        $userData = User::select('id', 'name', 'user_image_path')
            ->where('username', $username)
            ->first();

        if (session()->has('success_message')) {
            Alert::toast(session()->get('success_message'), 'success');
        }

        return view('feedback.givefeedback', compact('userData', 'username'));
    }

    public function saveFeedback(Request $request)
    {
        $feedback = new Feedback;

        $feedback->user_id = $request->user_id;
        $feedback->username = $request->username;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return back()->with('success_message', 'Feedback Submitted!');

    }

    public function deleteFeedback($feedbackId)
    {
        DB::table('feedbacks')
            ->where('id', '=', $feedbackId)
            ->delete();

        Alert::toast('Feedback Deleted!', 'info');

        return back();
    }
}
