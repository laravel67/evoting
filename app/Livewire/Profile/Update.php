<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Update extends Component
{
    use WithFileUploads;

    public $success;
    public $name;
    public $username;
    // public $image;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        // $this->image = Auth::user()->image;
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
            // 'image' => 'image|max:1024',
        ];

        if ($this->username !== $user->username) {
            $rules['username'] = 'required|unique:users';
        }

        // // Check if $this->image is an instance of UploadedFile
        // if ($this->image instanceof \Illuminate\Http\UploadedFile) {
        //     // If a new image is provided, delete the old image if it exists
        //     if ($user->image) {
        //         Storage::delete($user->image);
        //     }

        //     // Store the new image
        //     $this->image = $this->image->storeAs('profile-users', 'profile-' . $user->id . '.' . $this->image->extension(), 'public');
        // } else {
        //     // If $this->image is not an instance of UploadedFile, it means it's a string (existing image path)
        //     $this->image = $user->image;
        // }

        $this->validate($rules);

        $user->update([
            'name' => $this->name,
            'username' => $this->username,
            // 'image' => $this->image, // Use the existing image if no new one is provided
        ]);

        $this->success = 'Update profile berhasil';
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
    }
}
