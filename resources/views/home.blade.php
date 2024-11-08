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
        <div class="col-md-4 p-0">
            <form class="d-flex" role="search">
                <div class="input-group"> 
                    <input class="form-control border-secondary p-1 px-2 bg-white focus-ring focus-ring-primary input-blur" 
                        type="search" placeholder="Busca algun producto, orden, proveedor, etc." aria-label="Search">
                    <button class="btn border border-secondary p-1 px-2 bg-white" type="button">
                        Buscar
                    </button>
                </div>
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
                        <a href="#" class="fw-bold link-underline link-underline-opacity-0">Ver todos ></a>
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
