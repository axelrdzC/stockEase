<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles / Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container-fluid mt-4 ms-4">
        <h1><a class="navbar-brand fw-bold" href="#">Stock<span class="text-primary">Ease</span></a></h1>
    </div>    
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center vh-100 position-relative">
            <div class="text-center">
                <img src="img/welcome-guy.png" alt="just the welcome guy" class="position-relative img-fluid mx-auto d-block z-1" style="max-width: 32%;">
                <div class="welcome-txt text-nowrap position-absolute top-50 start-50 translate-middle mt-4 z-0">    
                    <h1 class="welcome-txt m-0">SU <span class="text-primary">ALMACEN</span></h1>
                    <H1 class="welcome-txt m-0">EN SU <span class="text-primary">MEJOR VERSION</span></H1>
                    <br><br><br><br><br><br><br>
                </div>
            </div>
            <div class="mt-4 text-center">
                <p>Por favor, acceda a alguna de las siguientes opciones para obtener acceso al almacén</p>
                @if (Route::has('login'))
                    <div class="d-flex gap-2 justify-content-center">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary col-4 z-2"> Dashboard </a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary col-4 z-2"> Log in </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-primary col-4 z-2"> Register </a>
                            @endif
                    @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>