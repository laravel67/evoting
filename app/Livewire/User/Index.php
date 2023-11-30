<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $nisn;
    public $name;
    public $gender;
    public $password;

    public $editedDataId;
    public $isEditing = false;

    public $delete_id;

    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function render()
    {
        $users = User::where('role', '!=', 'admin')
            ->latest()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('nisn', 'like', '%' . $this->search . '%');
            })->paginate(10);
        return view('livewire.user.index', compact('users'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function store()
    {
        $this->validate([
            'nisn' => 'required|max:10|unique:users',
            'name' => 'required|string|max:255',
            'gender' => 'nullable',
        ]);
        $password = Hash::make($this->nisn);

        User::create([
            'nisn' => $this->nisn,
            'name' => $this->name,
            'gender' => $this->gender,
            'password' => $password
        ]);

        $this->dispatch('success');
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->nisn   = '';
        $this->name   = '';
        $this->gender = '';
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        $this->nisn   = $data->nisn;
        $this->name   = $data->name;
        $this->gender = $data->gender;

        $this->editedDataId = $data->id;
        $this->isEditing = true;

        $this->dispatch('editData');
    }

    public function cancel()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->nisn   = '';
        $this->name   = '';
        $this->gender = '';
        $this->isEditing = false;
        $this->editedDataId = null;
    }

    public function update()
    {
        $user = User::findOrFail($this->editedDataId);
        $rules = [
            'name' => 'required|string|max:255',
            'gender' => 'required',
        ];
        if ($this->nisn !== $user->nisn) {
            $rules['nisn'] = 'required|max:10|unique:users,nisn';
        }
        $this->validate($rules);
        $password = Hash::make($this->nisn);
        $user->update([
            'nisn' => $this->nisn,
            'name' => $this->name,
            'gender' => $this->gender,
            'password' => $password
        ]);
        $this->dispatch('success');
        $this->resetForm();
    }

    public function deleteConfirmed($id)
    {
        $this->delete_id = $id;
        $this->dispatch('btn-delete');
    }

    public function delete()
    {
        $user = User::where('id', $this->delete_id)->first();
        if ($user != null) {
            $user->delete();
            $this->dispatch('success');
        }
    }
}
