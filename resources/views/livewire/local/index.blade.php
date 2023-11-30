<div>
    @if (!$isEditing)
        <form wire:submit.prevent="store" id="createForm" class="row">
        @else
            <form wire:submit.prevent="update" id="editForm" class="row">
    @endif
    @csrf
    <div class="form-group col-md-4">
        <label class="control-label">Kelas</label>
        <input wire:model="kelas" class="form-control @error('kelas') is-invalid @enderror" type="text"
            placeholder="Kelas" required autofocus>
        @error('kelas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-lg-4">
        <label class="control-label">Jenjang</label>
        <input wire:model="stage" class="form-control @error('stage') is-invalid @enderror" type="text"
            placeholder="Jenjang" required>
        @error('stage')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-3 align-self-end">
        <button type="submit" class="btn btn-primary">
            @if ($isEditing)
                Update
            @else
                Simpan
            @endif
        </button>
        @if ($isEditing)
            <button wire:click="cancelEdit" type="button" class="btn btn-secondary">Batal</button>
        @endif
    </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Jenjang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locals as $index=> $local)
                <tr>
                    <td>{{ $locals->firstItem()+ $index }}</td>
                    <td>{{ $local->kelas }}</td>
                    <td>{{ $local->stage }}</td>
                    <td>
                        <div class="btn-group">
                            <a wire:click="edit({{ $local->id }})" class="btn btn-warning text-light btn-sm"
                                href="#editKelas{{ $local->id }}">Ubah</a>
                            <a wire:click.prevent='deleteConfirmed({{ $local->id }})' class="btn btn-danger text-light btn-sm"
                                href="javascript:void(0)">Hapus</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $locals->links() }}
    @include('livewire.alert')
</div>
