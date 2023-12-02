@extends('home.app')
@section('content')
    @if (Auth::user()->role ==='admin')
        <a class="btn btn-danger" href="{{ route('dashboard') }}">Dashboard</a>
    @else
        <a class="btn btn-danger" href="{{ route('voting') }}">Voting</a>
    @endif
@endsection