<?php

namespace App\Livewire\Priode;

use App\Models\User;
use App\Models\Priode;
use Livewire\Component;

class Index extends Component
{
    public $priode;
    public $editedDataId;
    public $isEditing = false;
    public $delete_id;

    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function render()
    {
        $priodes = Priode::latest()->get();
        return view('livewire.priode.index', compact('priodes'));
    }

    public function store()
    {
        $this->validate([
            'priode' => 'required|unique:priodes'
        ]);
        Priode::create([
            'priode' => $this->priode
        ]);
        User::query()->update(['voting' => false, 'candidate_id' => null]);
        $this->dispatch('success');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->priode = '';
    }
    public function edit($id)
    {
        $data = Priode::findOrFail($id);
        $this->priode = $data->priode;
        $this->editedDataId = $data->id;
        $this->isEditing = true;
        $this->dispatch('editData');
    }
    public function update()
    {
        $this->validate([
            'priode' => 'required|unique:priodes',
        ]);

        Priode::findOrFail($this->editedDataId)->update([
            'priode' => $this->priode,
        ]);
        $this->dispatch('success');
        $this->resetForm();
    }
    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->priode = '';
        $this->editedDataId = null;
        $this->isEditing = false;
    }

    public function deleteConfirmed($id)
    {
        $this->delete_id = $id;
        $this->dispatch('btn-delete');
    }

    public function delete()
    {
        $priode = Priode::where('id', $this->delete_id)->first();
        if ($priode != null) {
            $priode->delete();
            $this->dispatch('success');
        }
    }
}
