<?php

namespace App\Livewire\Jabatan;

use App\Models\Jabatan;
use Livewire\Component;

class Index extends Component
{
    public $jabatan;
    public $editedDataId;
    public $isEditing = false;
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function render()
    {
        $jabatans = Jabatan::latest()->get();
        return view('livewire.jabatan.index', compact('jabatans'));
    }

    public function store()
    {
        $this->validate([
            'jabatan' => 'required|unique:jabatans'
        ]);

        Jabatan::create([
            'jabatan' => $this->jabatan
        ]);

        $this->dispatch('success');

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->jabatan = '';
    }

    public function edit($id)
    {
        $data = Jabatan::findOrFail($id);
        $this->jabatan = $data->jabatan;
        $this->editedDataId = $data->id;
        $this->isEditing = true;
        $this->dispatch('editData');
    }

    public function update()
    {
        $this->validate([
            'jabatan' => 'required|unique:jabatans'
        ]);

        Jabatan::findOrFail($this->editedDataId)->update([
            'jabatan' => $this->jabatan,
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
        $this->jabatan = '';
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
        $jabatan = Jabatan::where('id', $this->delete_id)->first();
        if ($jabatan != null) {
            $jabatan->delete();
            $this->dispatch('success');
        }
    }
}
