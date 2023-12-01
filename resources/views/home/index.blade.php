@extends('home.app')
@section('content')
    @if (auth()->user()->voting == false)
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
            Hai! <strong>{{ Auth::user()->name }}</strong> 👋, Silahkan pilih salah satu calon Bem    
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    @if ($candidates->count())
                        @foreach ($candidates as $candidate)
                            @if (
                                (auth()->user()->gender == 'Putra' && $candidate->gender == 'Putra') ||
                                    (auth()->user()->gender == 'Putri' && $candidate->gender == 'Putri'))
                                <div class="col-lg-4 mb-2">
                                    <div class="card border-primary">
                                        <div class=" d-flex justify-content-center mt-2">
                                            @if ($candidate->image)
                                                <img src="{{ asset('storage/' . $candidate->image) }}"
                                                    alt="{{ $candidate->image }}" class="img-thumbnail">
                                            @else
                                                <img src="{{ asset('cabem.png') }}" width="200">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{ $candidate->name_ketua }} &
                                                {{ $candidate->name_wakil }}</h5>
                                            <div class="row justify-content-center" role="group"
                                                aria-label="Basic example">
                                                <div class="col-lg mb-2">
                                                    <form id="vote-form" action="/vote" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-vote col"
                                                            data-candidate-id="{{ $candidate->id }}"
                                                            data-name-ketua="{{ $candidate->name_ketua }}"
                                                            data-name-wakil="{{ $candidate->name_wakil }}">
                                                            Vote
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-lg">
                                                    <button class="btn btn-success col" data-toggle="collapse" data-target="#collapse{{ $candidate->id }}" aria-expanded="false"
                                                        aria-controls="collapse">
                                                        Tampilkan Visi & Misi
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div id="collapse{{ $candidate->id }}" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                                                        <div class="card-body">
                                                            {!! $candidate->visi_misi !!}
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="alert alert-warning col-6" role="alert">
                            <h4><i class="fa fa-exclamation-circle"></i> Calon Belum Ada </h4>
                            <p>Silahkan keluar dari halaman ini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="alert alert-warning col text-center" role="alert">
                    <h5>
                        Hai, <strong class="font-weight-bolder text-dark">{{ Auth::user()->name }}</strong> 👋,Kamu sudah melakukan voting, jika kamu merasa belum
                            melakukan voting silahkan hubungi
                            Admin/Penitia . <i class=" fas fa-headset"></i>
                    </h5>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <lottie-player src="https://lottie.host/67d95457-e0db-4be3-adcc-e0177b7ea072/CVSDOQjm54.json"
                        background="##ffffff" speed="0.7" style="width: 500px; height: 500px" loop autoplay
                        direction="1" mode="normal">
                    </lottie-player>
                </div>
                <div class="row justify-content-center">
                    <form id="out-form-home" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-primary btn-out-home"> <i class="fa fa-sign-out fa-lg"></i> Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
