@extends('layouts.guest')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100 gap-5" style="max-width: 1000px;">

                <div class="col-lg-4 col-md-6 d-flex flex-column justify-content-center p-4">
                    <h1 class="fw-bold mb-3">Bienvenido 👋</h1>
                    <p class="mb-4">Today is a new day. It's your day. You shape it. Sign in to start managing your inventory.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror focus-ring input-blur" name="email" 
                                    value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <label for="password" class="form-label w-25">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                <div class="text-end w-75">
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror focus-ring input-blur" name="password" 
                                    required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row text-nowrap mt-3">
                                <div class="row w-50">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row gap-3">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="mx-2">Ó</span>
                            </div>
                            <button class="btn btn-outline-secondary text-dark w-100 mb-4">
                                <img src="https://pluspng.com/img-png/google-logo-png-open-2000.png" alt="Google logo" style="width: 20px; margin-right: 8px;">
                                Iniciar Sesión con Google
                            </button>
                        </div>

                    </form>

                    <p class="text-center">Aun no tienes una cuenta? <a href="{{ route('register') }}" class="text-decoration-none">Regístrate</a></p>

                </div>

                <div class="col-lg-7 col-md-2 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/login-guy.png') }}" alt="Login illustration" class="img-fluid ml-10" style="max-width: 100%; height: auto;">
                </div>
        </div>
    </div>
</div>
@endsection
