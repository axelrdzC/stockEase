@extends('layouts.app')

@section('content')
<div class="col px-5">
    <!-- header seccion -->
    <div class="d-flex justify-content-center align-items-center mb-4">
        <!-- titulo de la seccion -->
        <div class="col-md-8 p-0">
            <div class="fs-2 fw-semibold"> {{ __('Dashboard') }} </div>
        </div>
        <!-- buscador -->
        <div class="col-md-4">
            <form class="d-flex position-relative" role="search">
                <input class="form-control border-secondary px-4 p-2 bg-white border-0 shadow-sm" 
                    type="search" placeholder="Busca algun producto, orden, proveedor, etc." aria-label="Search">
                <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent me-2" type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.0183 18.4851L21.5423 22" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>
        </div>

    </div>

    <!-- grafica principal -->
    <div class="d-flex justify-content-center mb-3">
        <div class="col-md-8 w-100 p-0">
            <div class="card bg-white p-4">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Gráfico de ventas</div>
                    <div class="col" id="botones">
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE MES</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE AÑO</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">DESDE EL PRINCIPIO</button>            
                    </div>
                </div>
                <div class="card-body">
                    <!-- mostrar grafica si ya hay para (TODO) -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <!-- almacenes & productos -->
    <div class="d-flex justify-content-center gap-3 w-100">
        <div class=" p-0">
            <div class="card bg-white p-4">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Mis almacenes</div>
                    <div class="fs-5 text-end">
                        <a href="{{ route('almacenes.index') }}" class="fw-bold link-underline link-underline-opacity-0">Ver todos ></a>
                    </div>
                </div>

                <div class="d-flex mt-2">
                    @foreach ($almacenes as $almacen)
                        <button class="d-flex flex-grow-1 border rounded bg-transparent p-2 align-items-center justify-content-between">
                            <div class="d-flex flex-column">
                                <div class="fw-bold justify-content-end">{{ $almacen->nombre }}</div>
                                <span class="d-inline-block text-truncate" style="max-width: 10rem;">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    {{ $almacen->ubicacion }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <svg width="18" height="18" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L8 8L1 15" stroke="#53545C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex-grow-1 p-0">
            <div class="card bg-white p-4">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Productos</div>
                    <div class="col" id="botones">
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">MAS VENDIDOS</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">MENOS VENDIDOS</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">NIVEL BAJO DE STOCK</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">NIVEL ALTO DE STOCK</button>             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
