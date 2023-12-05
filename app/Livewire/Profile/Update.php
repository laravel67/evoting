<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Update extends Component
{
    use WithFileUploads;

    public $success, $name, $username, $image;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
    }

    public function render()
    {
        return view('livewire.profile.update', [
            'user' => Auth::user()
        ]);
    }
    public function update()
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,' . $user->id,
            'image' => 'file|image|max:1024',
        ];

        if ($this->username !== $user->username) {
            $rules['username'] = 'required|unique:users';
        }
        $this->validate($rules);
        if ($this->image) {
            if ($user->image) {
                Storage::delete('profile-user/' . $user->image);
            }
            $imageName = pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME);
            $imageName .= '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('profile-user', $imageName);
            $this->image = $imageName;
        } else {
            $this->image = $user->image;
        }
        $user->update([
            'name' => $this->name,
            'username' => $this->username,
            'image' => $this->image,
        ]);

        $this->success = 'Update profile berhasil';
        $this->resetForm();
    }


    public function resetForm()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->image = null;
    }
}
