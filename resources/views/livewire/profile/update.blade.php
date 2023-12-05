<div>
    <div class="row">
        <div class="col-md-3">
            <h2 class="mb-2 bg-primary col-12 text-light p-2"><i class="fa fa-user"></i> Profile</h2>
            <div class="tile">
                <div class="profile">
                    <div class="info">
                        @if ($user->image)
                            <div class="text-center">
                                <img class="user-img img-fluid rounded-circle" src="{{ asset('profile-user/' . $user->image) }}"
                                    style="width: 200px; height: 200px;">
                            </div>
                        @else
                            <div class="text-center">
                                <img class="user-img img-fluid rounded-circle" src="{{ asset('icons8-user-94.png') }}"
                                style="width: 200px; height: 200px;">
                            </div>
                        @endif
                        <h5>{{ $user->name }}</h5>
                        <div id="accordion">
                            <button class="btn btn-secondary col-12" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                Datail Profile <i class="fa fa-book"></i>
                            </button>
                            
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <ul class="list-group mt-2">
                                    Nama Lengkap:
                                    <li class="list-group-item">{{ $user->name }}</li>
                                    Username:
                                    <li class="list-group-item">{{ $user->username }}</li>
                                    Role/Level
                                    <li class="list-group-item">{{ $user->role }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tile">
                <div class="row">
                    <div class="col-md mb-3">
                        <div class="card">
                            <div class="card-header text-light bg-primary">
                                <h5> <i class="fa fa-edit"></i> Update Profile</h5>
                            </div>
                            <div class="card-body">
                                @if ($success)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><i class="fa fa-check-circle"></i></strong> {{ $success }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <form wire:submit.prevent='update' method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input wire:model="name" type="text" class="form-control @error('name')
                                            is-invalid
                                        @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input wire:model='username' type="text" class="form-control @error('username')
                                            is-invalid
                                        @enderror">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Gambar</label>
                                        <input wire:model="image" type="file" class="form-control-file mb-2">
                                        @if ($image)
                                            <img width="200" class="img-fluid img-preview" src="{{ $image->temporaryUrl() }}">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary col-12">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @livewire('profile.user')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
