<header class="header header-sticky mb-4 py-3 px-5 bg-white">
    <nav class="navbar navbar-expand-lg bg-transparent p-0">
        <div class="container-fluid bg-transparent p-0">
            <!-- logo -->
        <h1><a class="navbar-brand fw-bold" href="#">Stock<span class="text-primary">Ease</span></a></h1>
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
                <!-- profile -->
                <li class="nav-item dropdown d-flex justify-content-start align-items-center" style="width: 15%;">
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



