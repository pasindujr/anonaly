<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public $error;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function handleLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:14',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'is_admin' => 0])) {

            return redirect('account');

        } elseif (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'is_admin' => 1])) {
            return redirect('admin');

        } else {
            $this->email = null;
            $this->password = null;
            return $this->error = 'Invalid Credentials';
        }
    }
}
