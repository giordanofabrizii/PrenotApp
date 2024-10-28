@extends('layouts.app')

@section('links')
    @vite(['resources/js/validations/userRegistration.js','resources/js/passwordToggle.js', 'resources/js/passwordConfirmationToggle.js']);
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="myForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Es: Mario Rossi">

                                <p class="error"></p>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Es: mario@email.it">

                                <p class="error"></p>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Codice scuola') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="code" name="code" value="{{ old('code') }}" autocomplete="code" placeholder="Es: XXXXXXXX">

                                <p class="error"></p>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" name="password" type="password" autocomplete="new-password" required>

                                <p class="error"></p>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <!-- Checkbox per mostrare/nascondere la password -->
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="showPassword">
                                    <label class="form-check-label" for="showPassword">Mostra password</label>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" name="password_confirmation" type="password" autocomplete="new-password">

                                <p class="error"></p>

                                <!-- Checkbox per mostrare/nascondere la password -->
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="showConfirmationPassword">
                                    <label class="form-check-label" for="showPassword">Mostra password</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
