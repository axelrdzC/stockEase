<header class="header header-sticky mb-4 py-3 px-5 bg-white">
    <nav class="navbar navbar-expand-lg bg-transparent p-0">
        <div class="container-fluid bg-transparent p-0">
            <!-- logo -->
        <h1><a class="navbar-brand fw-bold fs-4" href="#">Stock<span class="text-primary">Ease</span></a></h1>
            <!-- boton menu responsivo -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- menu normal -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- modulos -->
                <ul class="header-nav d-flex justify-content-center flex-grow-1 m-0">
                    @include('components.categorias')
                </ul>
                <!-- notis y config -->
                <ul class="header-nav d-flex justify-content-center m-0 pe-5">
                    <ul class="nav nav-pills gap-3 d-flex justify-content-center align-items-center">
                        <li class="nav-item">
                            <a class="nav-link p-0" href="{{ route('configuracion') }}">
                                <svg width="24" height="24" class="nav-icon" fill="none">
                                    <path d="M13.6006 21.0761L19.0608 17.9236C19.6437 17.5871 19.9346 17.4188 20.1465 17.1834C20.3341 16.9751 20.4759 16.7297 20.5625 16.4632C20.6602 16.1626 20.6602 15.8267 20.6602 15.1568V8.84268C20.6602 8.17277 20.6602 7.83694 20.5625 7.53638C20.4759 7.26982 20.3341 7.02428 20.1465 6.816C19.9355 6.58161 19.6453 6.41405 19.0674 6.08043L13.5996 2.92359C13.0167 2.58706 12.7259 2.41913 12.416 2.35328C12.1419 2.295 11.8584 2.295 11.5843 2.35328C11.2744 2.41914 10.9826 2.58706 10.3997 2.92359L4.93843 6.07666C4.35623 6.41279 4.06535 6.58073 3.85352 6.816C3.66597 7.02428 3.52434 7.26982 3.43773 7.53638C3.33984 7.83765 3.33984 8.17436 3.33984 8.84742V15.1524C3.33984 15.8254 3.33984 16.1619 3.43773 16.4632C3.52434 16.7297 3.66597 16.9751 3.85352 17.1834C4.06548 17.4188 4.35657 17.5871 4.93945 17.9236L10.3997 21.0761C10.9826 21.4126 11.2744 21.5806 11.5843 21.6465C11.8584 21.7047 12.1419 21.7047 12.416 21.6465C12.7259 21.5806 13.0177 21.4126 13.6006 21.0761Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 11.9998C9 13.6566 10.3431 14.9998 12 14.9998C13.6569 14.9998 15 13.6566 15 11.9998C15 10.3429 13.6569 8.99976 12 8.99976C10.3431 8.99976 9 10.3429 9 11.9998Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link p-0" href="{{ route('clientes.index') }}">
                                <svg width="24" height="24" class="nav-icon" fill="none">
                                    <path d="M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9M15 17H18.5905C18.973 17 19.1652 17 19.3201 16.9478C19.616 16.848 19.8475 16.6156 19.9473 16.3198C19.9997 16.1643 19.9997 15.9715 19.9997 15.5859C19.9997 15.4172 19.9995 15.3329 19.9863 15.2524C19.9614 15.1004 19.9024 14.9563 19.8126 14.8312C19.7651 14.7651 19.7048 14.7048 19.5858 14.5858L19.1963 14.1963C19.0706 14.0706 19 13.9001 19 13.7224V10C19 6.134 15.866 2.99999 12 3C8.13401 3.00001 5 6.13401 5 10V13.7224C5 13.9002 4.92924 14.0706 4.80357 14.1963L4.41406 14.5858C4.29476 14.7051 4.23504 14.765 4.1875 14.8312C4.09766 14.9564 4.03815 15.1004 4.0132 15.2524C4 15.3329 4 15.4172 4 15.586C4 15.9715 4 16.1642 4.05245 16.3197C4.15225 16.6156 4.3848 16.848 4.68066 16.9478C4.83556 17 5.02701 17 5.40956 17H9" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </li>

                    </ul>
                </ul>
                <!-- profile -->
                <li class="nav-item dropdown d-flex col-md-2 justify-content-start align-items-center">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center w-100" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar me-2 w-100 d-flex justify-content-start align-items-center">
                            <img class="avatar-img me-3" src="{{ asset('img/default-avatar.jpg') }}" alt="{{ Auth::user()->email }}">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </div>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">Ver perfil</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar sesion') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>
</header>



