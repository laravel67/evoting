<?php

namespace App\Livewire\Comite;

use App\Models\Comite;
use App\Models\Jabatan;
use App\Models\Priode;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $jabatan_id;
    public $priode_id;

    public $editedDataId;
    public $isEditing = false;
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function render()
    {
        $priode = Priode::latest()->first(); // Mengubah orderBy menjadi latest
        $comites = Comite::where('priode_id', $priode->id)->get();
        return view('livewire.comite.index', [
            'title' => 'Penitia',
            'jabatans' => Jabatan::latest()->get(),
            'priodes' => Priode::latest()->get(),
            'comites' => $comites
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'jabatan_id' => 'required',
            'priode_id' => 'required',
        ]);

        Comite::create([
            'name' => $this->name,
            'jabatan_id' => $this->jabatan_id,
            'priode_id' => $this->priode_id
        ]);

        $this->dispatch('success');
        $this->resetInput();
    }

    public function edit($id)
    {
        $data = Comite::findOrFail($id);
        $this->name = $data->name;
        $this->jabatan_id = $data->jabatan_id;
        $this->priode_id = $data->priode_id;

        $this->editedDataId = $data->id;
        $this->isEditing = true;

        $this->dispatch('editData');
    }

    private function resetInput()
    {
        $this->name = '';
        $this->jabatan_id = '';
        $this->priode_id = '';
    }

    public function cancel()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name   = '';
        $this->jabatan_id = '';
        $this->priode_id = '';
        $this->isEditing = false;
        $this->editedDataId = null;
    }

    public function deleteConfirmed($id)
    {
        $this->delete_id = $id;
        $this->dispatch('btn-delete');
    }

    public function delete()
    {
        $comite = Comite::find($this->delete_id);
        if ($comite) {
            $comite->delete();
            $this->dispatch('success');
        }
    }
}
