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
            </form>
        </div>
    </div>
    <!-- add cliente -->
    @yield('add-boton')

</div>