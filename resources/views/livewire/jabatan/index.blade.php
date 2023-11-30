<div>
    @if (!$isEditing)
    <form wire:submit.prevent="store" id="createForm" class="row">
        @else
        <form wire:submit.prevent="update" id="editForm" class="row">
            @endif
            @csrf
            <div class="form-group col-md-4">
                <label class="control-label">{{ __('Jabatan') }}</label>
                <input wire:model="jabatan" class="form-control @error('jabatan') is-invalid @enderror" type="text"
                    placeholder="Jabatan" required autofocus>
                @error('jabatan')
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
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jabatans as $jabatan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jabatan->jabatan }}</td>
                    <td>
                        <div class="btn-group">
                            <a wire:click="edit({{ $jabatan->id }})" class="btn btn-warning text-light btn-sm"
                                href="#editKelas{{ $jabatan->id }}">Ubah</a>
                            <a wire:click.prevent='deleteConfirmed({{ $jabatan->id }})'
                                class="btn btn-danger text-light btn-sm" href="javascript:void(0)">Hapus</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @include('livewire.alert')
</div>
