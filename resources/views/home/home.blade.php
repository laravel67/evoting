@extends('home.app')
@section('content')
    @if (Auth::user()->role ==='admin')
       <div class="page-error tile">
        <h4>Hai, {{ Auth::user()->name }} Selamat Datang Di <h3 class="text-primary">E-VOTE</h3>
        </h4>
        <div class="row justify-content-center">
            <lottie-player src="https://lottie.host/71394296-8c91-4fbc-ad4b-999dd80db98d/rL3if9fVIz.json"
                background="##ffffff" speed="0.7" style="width: 300px; height: 300px" loop autoplay direction="1"
                mode="normal">
            </lottie-player>
        </div>
        <p>Silahkan klik tombol dibawah ini untuk menuju ke halaman dashboard</p>
        <p><a class="btn btn-primary" href="{{ route('dashboard') }}">Go To Dashboard Now</a></p>
    </div>
    @else
        <div class="page-error tile">
            <h4>Hai, {{ Auth::user()->name }} Selamat Datang Di <h3 class="text-primary">E-VOTE</h3>
            </h4>
            <div class="row justify-content-center">
                <lottie-player src="https://lottie.host/67d95457-e0db-4be3-adcc-e0177b7ea072/CVSDOQjm54.json"
                    background="##ffffff" speed="0.7" style="width: 300px; height: 300px" loop autoplay direction="1"
                    mode="normal">
                </lottie-player>
            </div>
            <p>Silahkan klik tombol dibawah ini untuk melakukan voting.</p>
            <p><a class="btn btn-primary" href="{{ route('voting') }}">Go Vote Now</a></p>
        </div>
    @endif
@endsection