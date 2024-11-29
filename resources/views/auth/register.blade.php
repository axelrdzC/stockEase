@extends('layouts.guest')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100 gap-5" style="max-width: 1000px;">

                <div class="col-lg-4 col-md-6 d-flex flex-column justify-content-center me-5">
                    <h1 class="fw-bold mb-3">Registrate 👋</h1>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Username') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror focus-ring input-blur" name="name" 
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Correo electronico') }}</label>

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
                                <label for="password" class="form-label w-25">{{ __('Contraseña') }}</label>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror focus-ring input-blur" name="password" 
                                    required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <label for="password-confirm" class="form-label">{{ __('Confirmar contraseña') }}</label>
                            </div>
                            <input id="password-confirm" type="password" class="form-control focus-ring input-blur" name="password_confirmation" 
                                    required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <div class="row text-nowrap mt-3">
                                <div class="row w-50">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recuerdame') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 mb-4">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Registrarse') }}</button>
                        </div>

                    </form>

                    <p class="text-center">Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-decoration-none">Inicia Sesion</a></p>

                </div>

                <div class="d-flex flex-grow-1 w-50 justify-content-center align-items-center">
                    <img src="{{ asset('img/ya-casi.png') }}" alt="Login illustration" class="img-fluid ml-10" style="max-width: 100%; height: auto;">
                </div>
        </div>
    </div>
</div>
@endsection
