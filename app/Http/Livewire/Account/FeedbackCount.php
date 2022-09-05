<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FeedbackCount extends Component
{
    public $feedbackCount;

    protected $listeners = ['refreshFeedbackCount' => '$refresh'];

    public function render()
    {
        $this->feedbackCount = DB::table('feedbacks')
            ->where('user_id', '=', Auth::user()->id)
            ->count();

        return view('livewire.account.feedback-count');
    }
}
