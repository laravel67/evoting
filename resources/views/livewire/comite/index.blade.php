<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <div class="mailbox-controls">
                <h4 class="text-primary">{{ __('Data Penitia Pelaksana') }}</h4>
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penitia</th>
                            <th>Jabatan</th>
                            <th>Priode Penitia</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comites as $comite)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $comite->name }}</td>
                            <td>{{ $comite->jabatan->jabatan }}</td>
                            <td>{{ $comite->priode->priode }}</td>
                            <td>
                                <div class="btn-group">
                                    <button wire:click.prevent='edit({{ $comite->id }})' class="btn btn-warning btn-sm text-light">Ubah</button>
                                    <button wire:click.prevent='deleteConfirmed({{ $comite->id }})' class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <div class="mailbox-controls">
                <h4 class="text-primary">{{ __('Tambah Penitia') }}</h4>
            </div>
            <div class="table-responsive mailbox-messages">
                <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}" id="{{ $isEditing ? 'editForm' : 'createForm' }}">
                    @csrf
                
                    <div class="form-group">
                        <label class="form-control-label" for="inputSuccess1">Nama Lengkap</label>
                        <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputSuccess1">Jabatan</label>
                        <select wire:model="jabatan_id" class="form-control">
                            <option>==Pilih Jabatan==</option>
                            @foreach ($jabatans as $jab)
                            <option value="{{ $jab->id }}">{{ $jab->jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputSuccess1">Priode</label>
                        <select wire:model="priode_id" class="form-control">
                            <option >Masa Priode</option>
                            @foreach ($priodes as $p)
                            <option value="{{ $p->id }}">{{ $p->priode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            {{ $isEditing ? 'Update' : 'Simpan' }}
                        </button>
                        @if ($isEditing)
                        <button wire:click.prevent="cancel" class="btn btn-secondary">Batal</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('livewire.alert')
</div>