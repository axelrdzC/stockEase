@extends('layouts.app')

@section('title', 'Órdenes de Compra')

@section('content')
<div class="col px-5">
    <!-- Header de la sección -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <h2 class="fw-bold">Órdenes de Compra</h2>
        </div>
        <div class="col-md-4 p-0">
            <form class="d-flex position-relative w-100" role="search">
                <input class="form-control border-secondary px-4 p-2 bg-white border-0 shadow-sm" 
                       type="search" placeholder="Buscar una orden" aria-label="Search">
                <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent me-2" type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.0183 18.4851L21.5423 22" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>
        </div>
        <div class="col-2">
            <button type="button" onclick="window.location.href='{{ route('ordenes.create') }}'" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm">
                Agregar orden +
            </button>
        </div>
    </div>

    <!-- Contenedor de órdenes -->
    <div class="d-flex gap-4">
        <!-- Filtros -->
        <div class="d-flex h-100" style="width: 18rem;">
            <div class="card border-0 bg-white shadow-sm w-100">
                <div class="card-body">
                    <h5 class="card-title">Filtros</h5>
                    <!-- Filtro por estado -->
                    <div class="mb-3">
                        <small class="form-label">ESTADO</small>
                        <select class="form-select bg-white">
                            <option selected>Seleccionar</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="completada">Completada</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                    </div>
                    <!-- Filtro por fecha -->
                    <div class="mb-3">
                        <small class="form-label">FECHA</small>
                        <input type="date" class="form-control bg-white">
                    </div>
                    <button type="button" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm mt-2">
                        Restablecer filtros
                    </button>
                </div>
            </div>
        </div>
        <!-- Lista de órdenes -->
        <div class="container p-0 flex-grow-1">
            <div class="col">
                @foreach ($ordenes as $orden)
                    <div class="card shadow-sm bg-white border-0 m-0 mb-3">
                        <div class="card-body d-flex align-items-center gap-4 px-4">
                            <div class="d-flex flex-column" style="width: 27rem;">
                                <h1 class="fs-5 fw-bold">Orden: {{ $orden->numero_orden }}</h1>
                                <div class="d-flex gap-2">
                                    <small class="fw-medium text-white rounded bg-primary p-1 px-2">Estado: {{ $orden->estado }}</small>
                                    <small class="rounded bg-white border border-secondary-subtle p-1 px-2">
                                        Fecha: <span class="fw-medium">{{ $orden->fecha }}</span>
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex flex-grow-1">
                                <div class="col-4">
                                    <small class="row">Proveedor</small>
                                    <small class="row fs-6 fw-bold">{{ $orden->proveedor->nombre }}</small>
                                </div>
                                <div class="col-4">
                                    <small class="row">Total</small>
                                    <small class="row fs-6 fw-bold">${{ number_format($orden->total, 2) }}</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <!-- Opciones -->
                                <div class="dropdown">
                                    <button type="button" class="btn rounded-3 border-2 btn-outline-secondary p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="svgs">
                                            <path d="M26.5657 20.0217H26.5807" stroke="#53545C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M19.884 20.0217H19.899" stroke="#53545C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.2023 20.0217H13.2173" stroke="#53545C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('ordenes.edit', $orden) }}">Editar</a></li>
                                        <li>
                                            <form action="{{ route('ordenes.destroy', $orden) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">Eliminar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
