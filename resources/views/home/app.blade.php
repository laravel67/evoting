<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Twitter meta-->
    <title>@yield('title', 'Voting')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vote.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
    <!-- Font-icon css-->
    <script src="{{ asset('js/icons.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"> --}}
</head>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-dark fixed-top bg-primary justify-content-around">
        <span class="navbar-text">
            <h5 class="text-light">{{ __('E-VOTING') }}</h5>
        </span>
        <form id="out-form-home" action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-primary btn-out-home"> <i class="fa fa-sign-out fa-lg"></i> Keluar</button>
        </form>
    </nav>
    <!-- Sidebar menu-->
    <main>
        <div class="container-fluid card-vote mb-5">
            @yield('content')
        </div>
    </main>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/myscript.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Succeed',
                icon: 'success',
                text: "{{ session('success') }}",
            });
        @elseif ($errors->any())
            Swal.fire({
                icon: "error",
                title: "Oops...",
                html: '{!! implode('<br>', $errors->all()) !!}',
            });
        @endif
    </script>
</body>

</html>
