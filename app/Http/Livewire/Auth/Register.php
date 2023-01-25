<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{

    use WithFileUploads;

    public $name;
    public $username;
    public $gender;
    public $photo;
    public $email;
    public $password;
    public $confirmPassword;

    public $error;
    public $success = '';

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function handleRegister()
    {
        $userImageName = null;

        //validation
        $this->validate([
            'name' => 'required',
            'username' => 'required|min:3|max:10|unique:users',
            'gender' => 'required',
            'photo' => 'nullable|mimes:jpg,png,jpeg|max:5048',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:14|same:confirmPassword',
            'confirmPassword' => 'required'
        ]);
        if ($this->photo) {
            $userImageName = time() . '-' . $this->username . '.' . $this->photo->extension();
            $this->photo->storeAs(public_path('userimages'), $userImageName);
        }

        $user = new User;
        $user->name = $this->name;
        $user->username = $this->username;
        $user->gender = $this->gender;
        $user->user_image_path = $userImageName;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $save = $user->save();

        if ($save) {
            session()->flash('success', 'You are registered successfully! Please go to login page to login');
            return redirect('/register');
        } else {
            return $this->error = 'Something went wrong! Please try again.';
        }
    }
}
