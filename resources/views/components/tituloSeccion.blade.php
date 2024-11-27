<div class="d-flex align-items-center mb-4 gap-3">
    
    <div class="col">
        <div class="fs-2 fw-semibold">@yield('titulo-seccion')</div>
    </div>
    <!-- buscador -->
    <div class="col-md-4">
        <div class="d-flex gap-2">
            <form class="d-flex position-relative w-100" role="search">
                <input class="form-control border-secondary px-4 p-2 bg-white border-0 shadow-sm" 
                    type="search" placeholder="@yield('buscador')" aria-label="Search">
                <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent me-2" type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.0183 18.4851L21.5423 22" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <!-- add cliente -->
    @yield('add-boton')

</div>