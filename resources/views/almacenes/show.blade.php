@extends('layouts.app')

@section('title', 'Almacenes') 

@section('content')
 <div class="col px-5">
    <!-- header de la seccion -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="fs-2 fw-semibold">{{ $almacen->nombre }}</div>
        </div>
    </div>
    <!-- info principal almacen (img, detalles) -->
    <div class="d-flex gap-4">
        <div class="col-3">
            <img src="{{ $almacen->img }}" alt="imagen almacen"
            class="w-100 rounded" style="height: 18em; object-fit: cover;">
        </div>
        <div class="col bg-white rounded shadow-sm p-4">
            <div class="d-flex align-items-center mb-3">
                <div class="fs-4 fw-bold">Detalles</div>
                <div class="flex-grow-1 text-end fs-6"> Agregado el <span class="fw-medium"> {{ $almacen->created_at }}</span> 
                                                        Por <span class="fw-medium"> {{ $almacen->nombre }}</span> 
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center gap-3">
                <div class="col">
                    <small class="fs-6 fw-medium"> Ubicacion </small>
                    <div class=""> 
                        {{ $almacen->pais . ', ' . $almacen->estado. ', ' . $almacen->ciudad. '. ' . $almacen->colonia . ', CP. ' . $almacen->codigo_p}} 
                    </div>
                </div>
                <div class="col">
                    <small class="fs-6 fw-medium"> Ultima actualizacion </small>
                    <div class=""> {{ $almacen->updated_at }} </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-4 rounded shadow-sm bg-white p-4">
        <div class="col">
            <div class="fw-bold fs-4">Administrar secciones</div>
        </div>
    </div>
</div> 


@endsection
