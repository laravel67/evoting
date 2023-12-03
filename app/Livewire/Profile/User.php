<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    public $password;

    public $error;
    public $success;

    protected $rules = [
        'password' => [
            'required', 'min:6', 'max:10'
        ]
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.profile.user');
    }

    public function updatePassword()
    {

        $this->validate();
        $user = Auth::user();
        $user->update(['password' => Hash::make($this->password)]);
        $this->success = 'kata sandi berhasil diubah';
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->password = null;
    }
}
