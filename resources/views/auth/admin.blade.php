<form action="{{ route('admin') }}" method="POST" class="sign-up-form">
    @csrf
    <img src="{{ asset('images/log.svg') }}" class="image" width="300" height="200">
    <br>
    <p class="title">{{ __('Masuk Ke Halaman Dashboard') }}</p>
    <div class="input-field @error('username') is-invalid @enderror">
        <i class="fa fa-user"></i>
        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required
            autofocus autocomplete="off">
    </div>
    @error('username')
    <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    <div class="input-field @error('password') is-invalid @enderror">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Kata Sandi" required>
    </div>
    @error('password')
    <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    <button class="btn solid" type="submit"> <i class="fa fa-sign-in fa-lg"></i>
        {{ __('Masuk') }}</button>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.querySelector('input[name="password"]');
        const showPasswordCheckbox = document.querySelector('#showPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    });
</script>