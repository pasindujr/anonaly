<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackList extends Component
{
    use WithPagination;

    public function deleteFeedback($feedbackId)
    {

        DB::table('feedbacks')
            ->where('id', '=', $feedbackId)
            ->delete();

        $this->emit('refreshFeedbackCount');

    }

    public function render()
    {
        $userFeedbacks = DB::table('feedbacks')
            ->select('id', 'feedback', 'created_at')
            ->where('user_id', '=', Auth::user()->id)
            ->paginate(8);

        return view('livewire.account.feedback-list', compact('userFeedbacks'));
    }
}
