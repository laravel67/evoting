@extends('dashboard.components.layouts.main')
@section('main')
    <div class="row">
        <img src="" alt="" srcset="">
        <div class="col-md-12">
            <div class="bg-primary">
                <h3 class="text-center text-light">{{ $title }}</h3>
            </div>
            <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tile">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <h4 class="text-primary">Nama Ketua</h4>
                            <hr>
                            <div class="form-group">
                                <label>NISN Ketua</label>
                                <input type="text" name="nisn_ketua" id="nisn_ketua"
                                    class="form-control @error('nisn_ketua') is-invalid @enderror"
                                    value="{{ old('nisn_ketua') }}">
                                @error('nisn_ketua')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Ketua</label>
                                <input type="text" name="name_ketua" id="name_ketua"
                                    class="form-control @error('name_ketua') is-invalid @enderror"
                                    value="{{ old('name_ketua') }}">
                                @error('name_ketua')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Priode/Masa Jabatan</label>
                                <select name="priode_id" id="priode_id" class="form-control">
                                    @foreach ($priodes as $priode)
                                        @if (old('priode_id') == $priode->id)
                                            <option value="{{ $priode->id }}" selected>{{ $priode->priode }}</option>
                                        @else
                                            <option value="{{ $priode->id }}">{{ $priode->priode }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-primary">
                                    <h3>Visi & Misi</h3>
                                </label>
                                <input id="visi_misi" type="hidden" name="visi_misi" value="{{ old('visi_misi') }}">
                                <trix-editor input="visi_misi"></trix-editor>
                                @error('visi_misi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <h4 class="text-primary">Nama Wakil Ketua</h4>
                            <hr>
                            <div class="form-group">
                                <label>NISN Wakil Ketua</label>
                                <input type="text" name="nisn_wakil" id="nisn_wakil"
                                    class="form-control @error('nisn_wakil') is-invalid @enderror"
                                    value="{{ old('nisn_wakil') }}">
                                @error('nisn_wakil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Wakil Ketua</label>
                                <input type="text" name="name_wakil" id="name_wakil"
                                    class="form-control @error('name_wakil') is-invalid @enderror"
                                    value="{{ old('name_wakil') }}">
                                @error('name_wakil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Foto/Gambar</label>
                                <input type="file" name="image" id="image"
                                    class="form-control-file @error('image') is-invalid @enderror"
                                    onchange="previewImage()">
                                <img class="img-preview img-fluid mt-3 col-sm-4">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Daftar Sebagi BEM (*Putra *Putri)</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Putra">Putra</option>
                                    <option value="Putri">Putri</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer text-right">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i>Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
