@extends('layouts.app')

@section('title', 'Almacenes') 

@section('content')
 <div class="col px-5">
    <!-- header de la seccion -->
    <div class="d-flex align-items-end shadow-sm justify-content-center p-4 rounded rounded-bottom-0" 
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.4)), url('{{ asset($almacen->img ?? 'storage/img/almacen.png') }}'); 
    height: 16em; background-size: cover; background-position: center;">

        <div class="row text-center shadow-sm d-flex justify-content-center">
            <div class="fs-1 fw-semibold" style="color: white">{{ $almacen->nombre }}</div>
            <div style="color: white">
                Agregado el <span class="fw-medium">
                    {{ \Carbon\Carbon::parse($almacen->created_at)->translatedFormat('d \d\e F \d\e Y\, h:i a') }}    
                </span> 
                @isset($theCreador)
                por <span class="fw-medium"> {{ $theCreador->name }} </span> 
                <img src="{{ asset($theCreador->img) }}" alt="" class="ms-1 avatar-img border border-2 border-primary"
                style="max-width: 30px; object-fit: cover;">
                @endisset
            </div>
        </div>

    </div>
    <!-- info principal almacen (img, detalles) -->
    <div class="d-flex bg-white shadow-sm rounded rounded-top-0 gap-3">
        <div class="col p-4">
            <div class="d-flex align-items-center mb-3">
                <div class="fs-4 fw-bold">Detalles del almacén</div>
                <div class="flex-grow-1 text-end fs-6">

                </div>
            </div>
            <div class="d-flex flex-column justify-content-center gap-3">
                <div class="col">
                    <small class="fs-6 fw-medium"> Ubicacion </small>
                    <div class=""> 
                        {{ $almacen->ubicacion }} 
                    </div>
                </div>
                <div class="col">
                    <small class="fs-6 fw-medium"> Ultima actualizacion </small>
                    <div class="">
                        {{ \Carbon\Carbon::parse($almacen->updated_at)->translatedFormat('d \d\e F \d\e Y\, h:i a') }}    
                    </div>
                </div>
                <div class="col">
                    <button data-bs-toggle="modal" data-bs-target="#verProductos" 
                    class="btn btn-primary fw-medium shadow-sm mb-2"> Ver todos los productos </button>
                </div>
            </div>
        </div>
        <div class="col p-4">
            <div class="d-flex align-items-center mb-3">
                <div class="fs-4 fw-bold">Capacidad</div>
                <div class="flex-grow-1 text-end fs-6">

                </div>
            </div>
            <div class="d-flex flex-column justify-content-center gap-3">
                <div class="d-flex w-100 gap-3 align-items-center pe-2">
                    <p class="fw-medium fs-5 m-0"> {{ $pCapacidad . '%' }} </p>
                    <div class="progress w-100" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: {{ $pCapacidad . '%' }}"></div>
                    </div>
                </div>
                <div class="col">
                    <small class="fs-6 fw-medium"> Resumen </small>
                    <div class="row"> 
                        <p class="m-0"> Capacidad total: {{ $almacen->capacidad }} </p>
                        <p class="m-0"> Espacio ocupado por productos: {{ $pCapacidad }} </p>
                        <p class="m-0"> Espacio ocupado por secciones: {{ $almacen->capacidad }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-4 rounded shadow-sm bg-white p-4">
        <div class="d-flex gap-5 w-100">
            @include('components.charts.pieSeccion', ['capacidad' => $capacidad, 'nombreSeccion' => $nombreSeccion])
        </div>
    </div>
</div> 

@include('components.modales.seeProductos')

@endsection
