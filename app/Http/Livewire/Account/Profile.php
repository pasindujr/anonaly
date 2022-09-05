<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class Profile extends Component
{
    public function render(): View
    {
        return view('livewire.account.profile');
    }

    public function logoutUser()
    {

        Auth::logout();

        return redirect(route('auth.login'));

    }

}
