@extends('dashboard.components.layouts.main')
@section('main')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Total Pemilih</h4>
                    <strong id="voters"></strong>
                    <span>Pemilih</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa" id="votedPercentage"></i>
                <div class="info">
                    <h4>Sudah Memilih</h4>
                    <strong id="voted"></strong>
                    <span>Orang</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa" id="notVotedPercentage"></i>
                <div class="info">
                    <h4>Belum Memilih</h4>
                    <strong id="notVoted"></strong>
                    <span>Orang</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Jumlah Kandidat</h4>
                    <strong id="getCandidates"></strong>
                    <span>Orang</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div id="chartContainerPutra">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <div id="chartContainerPutri"></div>
            </div>
        </div>
    </div>
@section('footer')
    @include('dashboard.scripts.scripts')
@endsection
@endsection
