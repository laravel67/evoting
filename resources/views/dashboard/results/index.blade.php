@extends('dashboard.components.layouts.main')
@section('main')
<div class="row">
    <div class="col-md-6">
        <div class="tile">
            @if ($calonTerbanyakPutra)
            <h3 class="tile-title text-center bg-primary text-light">{{ __('BEM PUTRA') }} {{$calonTerbanyakPutra->priode->priode }}
            </h3>
            @if ($calonTerbanyakPutra->votes != null)
                <div class="row">
                    <div class="col">
                        @if ($calonTerbanyakPutra->image)
                        <img src="{{ asset('storage/'.$calonTerbanyakPutra->image ) }}" width="300">
                        @else
                        <img src="{{ asset('cabem.png') }}" width="300">
                        @endif
                        <h5>
                            {{ $calonTerbanyakPutra->name_ketua }} & {{ $calonTerbanyakPutra->name_wakil }} <br>
                        </h5>
                    </div>
                    <div class="col text-center align-items-center">
                        <h3 class="text-item-center">JUMLAH SUARA</h3>
                        <div class="widget-small primary"><i class="icon fa-3x">
                                {{ $calonTerbanyakPutra->votes }}
                            </i>
                            <div class="info">
                                <h1>SUARA</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i> {{ __('Lantik sekarang') }}
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    Belum ada yang melakukan voting
                </div>
            @endif
            @else
                <div class="alert alert-warning" role="alert">
                    Belum ada data calon untuk periode terbaru.
                </div>
            @endif
        </div> 
    </div>
    <div class="col-md-6">
        <div class="tile">
            @if ($calonTerbanyakPutri)
            <h3 class="tile-title text-center bg-primary text-light">{{ __('BEM PUTRI') }} {{$calonTerbanyakPutri->priode->priode  }}</h3>
            @if ($calonTerbanyakPutri->votes != null)
                <div class="row">
                    <div class="col">
                        @if ($calonTerbanyakPutri->image)
                        <img src="{{ asset('storage/'.$calonTerbanyakPutri->image ) }}" width="300">
                        @else
                        <img src="{{ asset('cabem.png') }}" width="300">
                        @endif
                        <h5>
                            <h5>
                                {{ $calonTerbanyakPutri->name_ketua }} & {{ $calonTerbanyakPutri->name_wakil }} <br>
                            </h5>
                    </div>
                    <div class="col text-center align-items-center">
                        <h3 class="text-item-center">JUMLAH SUARA</h3>
                        <div class="widget-small primary"><i class="icon fa-3x">
                                {{ $calonTerbanyakPutri->votes }}
                            </i>
                            <div class="info">
                                <h1>SUARA</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <form action="" method="post">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i> {{ __('Lantik sekarang') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
            <div class="alert alert-warning" role="alert">
                Belum ada yang melakukan voting
            </div>
            @endif
            @else
            <div class="alert alert-warning" role="alert">
                Belum ada data calon untuk periode terbaru.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection