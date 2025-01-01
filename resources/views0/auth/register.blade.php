@extends('welcome')

@section('content')

<!-- register form container -->
<div class="register-container">
    <i class="fas fa-times" id="form-close1"></i>
    <!-- register form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>register</h3>

       <input id="name" type="text" class="box @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="enter your full name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        <input id="email" type="email" class="box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="enter your email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        <input id="password" type="password" class="box @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="enter your password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        <input id="password-confirm" type="password" class="box" name="password_confirmation" required autocomplete="new-password"placeholder="ensure your password">
        <input type="submit" value="register now" class="btn">

    </form>

</div>
@endsection
