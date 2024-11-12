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
