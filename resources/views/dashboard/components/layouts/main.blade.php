<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- fonts --}}
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ __('E-Voting| '). $title}} </title>
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- TRIX EDITOR --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body class="app sidebar-mini rtl">
    @include('dashboard.components.partials.topbar')
    @include('dashboard.components.partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Selamat datang di halaman dashboard</h1>
            </div>
        </div>
        @yield('main')
    </main>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/myscript.js') }}"></script>
    @yield('footer')
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
