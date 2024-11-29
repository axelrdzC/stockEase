@extends('layouts.app')

@section('title', 'Almacenes') 

@section('content')
 <div class="col px-5">
    <!-- header de la seccion -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="fs-2 fw-semibold">{{ __('Almacenes') }}</div>
        </div>
        <!-- buscador -->
        <div class="col-md-4 p-0">
            <div class="d-flex p-0 gap-2">
                <form class="d-flex position-relative w-100" role="search">
                    <input class="form-control border-secondary px-4 p-2 bg-white border-0 shadow-sm" 
                        type="search" placeholder="Busca algun almacen" aria-label="Search">
                    <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent me-2" type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.0183 18.4851L21.5423 22" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <!-- add almacen -->
        <div class="col-2">
            <div class="d-flex align-items-center">
                <button type="button" onclick="window.location.href='{{ route('almacenes.create') }}'" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm">
                    Agregar almacen +
                </button>
            </div>
        </div>
    </div>
    <!-- contenedor almacenes -->
    <div class="d-flex gap-4">
    <!-- filtros -->
    <div class="d-flex h-100" style="width: 18rem;">
        <div class="card border-0 bg-white shadow-sm w-100">
            <div class="card-body">
                <h5 class="card-title">Filtros</h5>
                <!-- filtro orden abc -->
                <div class="mb-3">
                    <small for="filterCategory" class="form-label">ORDENAR POR</small>
                    <select id="filterCategory" class="form-select selects">
                        <option selected>Seleccionar</option>
                        <option value="1">ALFABETICO: A-Z</option>
                        <option value="2">ALFABETICO: Z-A</option>
                    </select>
                </div>
                <!-- filtro por categoria -->
                <div class="mb-3">
                    <small for="filterCategory" class="form-label">NIVEL DE OCUPACIÓN</small>
                    <select id="filterCategory" class="form-select selects">
                        <option selected>Seleccionar</option>
                        <option value="1">TODOS</option>
                        <option value="2">VINILOS</option>
                        <option value="2">GALLETAS</option>
                        <option value="2">ROPA</option>
                    </select>
                </div>
                <!-- filtro por precio -->
                <div class="mb-3">
                    <small for="filterPrice" class="form-label">UBICACIÓN</small>
                    <select id="filterPrice" class="form-select selects">
                        <option selected>Seleccionar</option>
                        <option value="1">TODOS</option>
                        <option value="2">$50 - $100</option>
                        <option value="3">$100 - $200</option>
                    </select>
                </div>
                <!-- boton reset filtros -->
                <button type="button" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm mt-2">
                    Restablecer filtros
                </button>
            </div>
        </div>
    </div>
</div>
</div> 


@endsection
