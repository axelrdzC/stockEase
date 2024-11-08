@extends('layouts.app')

@section('content')
<!-- header seccion -->
<div class="row align-items-center px-5 mb-4">
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
<div class="row justify-content-center px-5">
    <div class="col-md-8 w-100 p-0">
        <div class="card bg-white p-4">

            <div class="row align-items-center">
                <div class="col-3">
                    <div class="fs-5 fw-semibold">Gráfico de ventas</div>
                </div>
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
<div class="row justify-content-center px-5">
    <div class="col-sm-4 mb-3 p-0">
        <div class="card bg-white p-4">

            <div class="row align-items-center">
                <div class="col-3">
                    <div class="fs-5 fw-semibold">Gráfico de ventas</div>
                </div>
                <div class="col" id="botones">
                    <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">DESDE EL PRINCIPIO</button>            
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8 mb-3 p-0">
        <div class="card bg-white p-4">

            <div class="row align-items-center">
                <div class="col-3">
                    <div class="fs-5 fw-semibold">Gráfico de ventas</div>
                </div>
                <div class="col" id="botones">
                    <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE MES</button>
                    <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE AÑO</button>
                    <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">DESDE EL PRINCIPIO</button>            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
