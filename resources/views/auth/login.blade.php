<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('js/icons.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
    <title>{{ __('Autentikasi') }}</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                @include('auth.user')
                {{-- Login D --}}
                @include('auth.admin')  
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                   <h3>Selamat Datang 👋 </h3>
                    <p>
                        Silahkan masuk ke halaman dashboard untuk mengelola data pemilihan
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Login Dashboard
                    </button>
                </div>
                <img src="{{ asset('images/register.svg') }}" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Selamat Datang 👋 </h3>
                    <p>
                        E-voting adalah sebuah aplikasi yang digunakan untuk pemungutan suara pada pemilihan BEM
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Voting
                    </button>
                </div>
                <img src="{{ asset('images/register.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
    <script src="{{ asset('js/show.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script>
    @if (session('success'))
        Swal.fire({
            position: "top-end",
            icon: "success",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
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
