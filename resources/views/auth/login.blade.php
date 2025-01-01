@extends('welcome')

@section('content')
<div class="login-form-container">

    <!-- close icone -->
    <i class="fas fa-times" id="form-close"></i>

    <!-- login form --> 
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" type="email" class="box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
        <input id="password" type="password" class="box @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        <input type="submit" value="login now" class="btn">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have an account? <i class="fas fa-user-plus" id="register-btn"> register now</i> </a>
        </p>
    </form>
</div>
@endsection
