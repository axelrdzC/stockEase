<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles / Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body class="container d-flex flex-column justify-content-center align-items-center vh-100">

        <!-- Título de la página 
        <div class="mt-4">
            <h2 class="m-0">
                <a class="navbar-brand fw-bold">Stock<span class="text-primary">Ease</span></a>
            </h2>
        </div>     -->
    
        <!-- Contenedor principal -->
        <div class="d-flex flex-grow-1 justify-content-center align-items-center w-100">

            <!-- Imagen (columna izquierda) -->
            <div class="col-6 d-flex">
                <img src="{{ asset('img/welcome-guy.png') }}" 
                    alt="welcome guy" 
                    class="img-fluid slide-right" 
                    style="max-width: 32%;"
                >
            </div>

            <!-- Texto y enlaces (columna derecha) -->
            <div class="col-6 d-flex flex-column justify-content-center z-0">
                <!-- Texto de bienvenida -->
                <div class="mb-5">
                    <h1 class="welcome-txt m-0">SU <span class="text-primary">ALMACÉN</span></h1>
                    <h1 class="welcome-txt m-0">EN SU <span class="text-primary">MEJOR VERSIÓN</span></h1>
                </div>
    
                <!-- Instrucciones y enlaces -->
                <p class="mb-3">Por favor, seleccione alguna de las siguientes opciones para obtener acceso al almacén</p>
                @if (Route::has('login'))
                    <div class="d-flex gap-2">
                        @auth
                            <a href="{{ route('home') }}" class="btn btn-primary col-3">Ir al Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary col-3">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-primary col-3">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

        </div>
    </body>
    
</html>