<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- fonts --}}
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ __('E-Voting| '). $title}} </title>
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
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
                <h1>{{ __('Selamat datang di halaman dashboard') }}</h1>
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
    <script src="{{ asset('js/pace.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/myscript.js') }}"></script>
    <script src="{{ asset('js/alert.lantik.js') }}"></script>
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

        $(document).ready(function () {
        $.ajax({
            url: '{{ route('api.newvoters') }}',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.length > 0) {
                    $('#newVotersContainer').empty();
                    data.forEach(function (voter) {
                        var voterHtml = '<a class="app-notification__item" href="javascript:;">' +
                                '<span class="app-notification__icon">' +
                                '<span class="fa-stack fa-lg">' +
                                '<i class="fa fa-circle fa-stack-2x text-primary"></i>' +
                                '<i class="fa fa-user fa-stack-1x fa-inverse"></i>' +
                                '</span>' +
                                '</span>' +
                                '<div>' +
                                '<p class="app-notification__message" id="nameVoters">' + voter.user.name + '</p>' +
                                '<small class="app-notification__message text-secondary" id="nisnVoters">' + voter.user.nisn + '</small>' +
                                '</div>' +
                                '</a>';
    
                            $('#newVotersContainer').append(voterHtml);
                        });
                    }
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>
</body>

</html>
