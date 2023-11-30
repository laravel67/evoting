<div>
    @if (!$isEditing)
    <form wire:submit.prevent="store" id="createForm" class="row">
        @else
        <form wire:submit.prevent="update" id="editForm" class="row">
            @endif
            @csrf
            <div class="form-group col-md-4">
                <label class="control-label">{{ __('Priode') }}</label>
                <input wire:model="priode" class="form-control @error('priode') is-invalid @enderror" type="text"
                    placeholder="Priode" required autofocus>
                @error('priode')
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
                    <th>Priode/Masa Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($priodes as $priode)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $priode->priode }}</td>
                    <td>
                        <div class="btn-group">
                            <a wire:click="edit({{ $priode->id }})" class="btn btn-warning text-light btn-sm">Ubah</a>
                            <a wire:click.prevent='deleteConfirmed({{ $priode->id }})'
                                class="btn btn-danger text-light btn-sm" href="javascript:void(0)">Hapus</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @include('livewire.alert')
</div>
