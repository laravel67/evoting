<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tile">
                <div class="row mb-2">
                    <div class="col">
                        <h4>Daftar Nama Pemilih</h4>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input class="form-control" wire:model.live="search" type="text" placeholder="Cari...">
                        </div>
                    </div>
                </div>
                <div class="tile-body table-responsive-sm table-striped table-sm table table-bordered">
                    <table class="table" id="sampleTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>NISN</th>
                                <th>Nama Santri</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td><img class="img-fluid" src="{{ asset('user.png') }}" width="50"></td>
                                <td>{{ $user->nisn }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>
                                    @if ($user->voting == true)
                                    <strong class="text-success">sudah voting <i class="fa fa-check"></i></strong>
                                    <a class="text-success" href="#edit{{ $user->id }}" data-toggle="modal"></a>
                                    @else
                                    <strong class="text-secondary">belum voting <i class="fa fa-warning"></i></strong>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a wire:click="edit({{ $user->id }})" class="btn btn-warning text-light btn-sm">Ubah</a>
                                        @if ($user->candidate_id == null)
                                        <a class="btn btn-primary text-light btn-sm disabled">Reset</a>
                                        @else
                                        <form id="form-reset"
                                            action="{{ route('reset', ['id' => $user->id, 'candidate_id' => $user->candidate_id]) }}"
                                            method="post">
                                            @csrf
                                            <button class="btn btn-primary btn-reset btn-sm" type="submit">Reset
                                            </button>
                                        </form>
                                        @endif
                                        <form id="delete-form" action="{{ route('users.destroy', $user->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-delete btn-sm" type="submit">Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tile">
                <p>
                    <form class="row" action="{{ route('import') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label class="control-label">Import data dari Excel</label>
                            <input class="form-control-file" type="file" name="file">
                        </div>
                        <div class="form-group col-md-4 align-self-end">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-upload"></i>Import</button>
                        </div>
                    </form>
                </p>
                <div class="tile-body">
                <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}" id="{{ $isEditing ? 'editForm' : 'createForm' }}">
                    @csrf
                    <div class="form-group has-success">
                        <label class="form-control-label" for="inputSuccess1">Nomor Induk Siswa</label>
                        <input wire:model="nisn" class="form-control @error('nisn') is-invalid @enderror" type="text">
                        @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputSuccess1">Nama Lengkap</label>
                        <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputSuccess1">Jenis Kelamin</label>
                        <select wire:model="gender" class="form-control">
                            <option value="null">Pilih Gender</option>
                            <option value="Putra">Putra</option>
                            <option value="Putri">Putri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            @if ($isEditing)
                            Update
                            @else
                            Simpan
                            @endif
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
   
