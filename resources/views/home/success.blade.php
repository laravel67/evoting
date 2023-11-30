@extends('home.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="alert alert-success col text-center" role="alert">
                <h4>
                        Terimakasih
                    <strong class="font-weight-bolder text-dark">{{ Auth::user()->name }}</strong> 🫰🏻, Kamu telah berhasil melakukan voting . <i class=" fas fa-check"></i>
                </h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <lottie-player src="https://lottie.host/3343cf12-8947-48fa-a526-834152d4b69e/QuN2fGsouZ.json"
                    background="##FFFFFF" speed="1.5" style="width: 400px; height: 400px" loop autoplay direction="1"
                    mode="normal">
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
@endsection
