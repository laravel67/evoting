<div>
<div class="card">
    <div class="card-header text-light bg-primary">
        <h5><i class="fa fa-key"></i> Ganti Sandi</h5>
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
            <div class="input-group mb-3">
                <input type="password" wire:model.live='password' class="form-control col-12 @error('password')
                    is-invalid
                @enderror" placeholder="Masukkan Sandi Baru">
                <div class="input-group-append">
                    <button wire:click='updatePassword' type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            @error('password')
                <div class="invalid-feedbackr">{{ $message }}</div>
            @enderror
    </div>
</div>
</div>
