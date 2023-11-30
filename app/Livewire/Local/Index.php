<?php

namespace App\Livewire\Local;

use App\Models\Local;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $kelas;
    public $stage;
    public $editedDataId;
    public $isEditing = false;
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function render()
    {
        $locals = Local::latest()->paginate(5);
        return view('livewire.local.index', compact('locals'));
    }
    public function store()
    {
        $this->validate([
            'kelas' => 'required|unique:locals',
            'stage' => 'required'
        ]);
        Local::create([
            'kelas' => $this->kelas,
            'stage' => $this->stage,
        ]);
        $this->dispatch('success', ['message' => 'Kelas baru berhasil ditambah']);
        $this->resetInputFields();
    }
    private function resetInputFields()
    {
        $this->kelas = '';
        $this->stage = '';
    }
    // Update data
    public function edit($id)
    {
        $data = Local::findOrFail($id);
        $this->kelas = $data->kelas;
        $this->stage = $data->stage;
        $this->editedDataId = $data->id;
        $this->isEditing = true;

        $this->dispatch('editData');
    }

    public function update()
    {
        $this->validate([
            'kelas' => 'required',
            'stage' => 'required',
        ]);

        Local::findOrFail($this->editedDataId)->update([
            'kelas' => $this->kelas,
            'stage' => $this->stage,
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
        $this->kelas = '';
        $this->stage = '';
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
        $local = Local::where('id', $this->delete_id)->first();
        if ($local != null) {
            $local->delete();
            $this->dispatch('success');
        }
    }
}
