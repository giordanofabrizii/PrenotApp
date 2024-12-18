@extends('layouts.app')

@section('links')
    @vite(['resources/js/validations/userLogin.js','resources/js/passwordToggle.js'])
@endsection

@section('content')
<div class="myContainer">
    <form method="POST" action="{{ route('login') }}" id="myForm">
        @csrf

        <div class="inputContainer">
            <label for="email">Indirizzo email</label>
            <div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                    <span role="alert">
                        <strong class="error on">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="inputContainer">
            <label for="password">Password</label>
            <div>
                <input id="password" type="password" name="password" autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-check my-2">
            <input type="checkbox" class="form-check-input" id="showPassword">
            <label class="form-check-label" for="showPassword">Mostra password</label>
        </div>

        <div class="mb-3">
            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Ricordami</label>
        </div>

        <button class="submit" type="submit">Login</button>

        <div class="mt-3 text-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Hai dimenticato la tua password?</a>
            @endif
        </div>
    </form>

</div>
@endsection
