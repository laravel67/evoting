<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('js/icons.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
    <title>{{ __('Autentikasi') }}</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route('auth') }}" method="POST" class="sign-in-form">
                    @csrf
                    <img src="{{ asset('images/log.svg') }}" class="image" width="300" height="200">
                    <br>
                    <p class="title">{{ __('Masuk Ke Halaman Voting') }}</p>
                    <div
                        class="input-field @error('nisn')
                            is-invalid
                        @enderror">
                        <i class="fa fa-user"></i>
                        <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional"
                            value="{{ old('nisn') }}" required autofocus autocomplete="off">
                    </div>
                    @error('nisn')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                    <div
                        class="input-field @error('password')
                            is-invalid
                        @enderror">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Kata Sandi" required>
                        <label class="form-check-label" for="showPassword">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <span>show</span>
                        </label>
                    </div>
                    @error('password')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                    <button class="btn solid" type="submit"> <i class="fa fa-sign-in fa-lg"></i>
                        {{ __('Masuk') }}</button>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Selamat Datang 👋 </h3>
                    <p>
                        E-voting adalah sebuah aplikasi yang digunakan untuk pemungutan suara pada pemilihan BEM
                    </p>
                </div>
                <img src="{{ asset('images/register.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>
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
