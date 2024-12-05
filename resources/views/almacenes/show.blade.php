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
                        {{ $almacen->pais . ', ' . $almacen->estado. ', ' . $almacen->ciudad. '. ' . $almacen->colonia . ', CP. ' . $almacen->codigo_p}} 
                    </div>
                </div>
                <div class="col">
                    <small class="fs-6 fw-medium"> Ultima actualizacion </small>
                    <div class="">
                        {{ \Carbon\Carbon::parse($almacen->updated_at)->translatedFormat('d \d\e F \d\e Y\, h:i a') }}    
                    </div>
                </div>
                <div class="d-flex gap-4">
                    <button data-bs-toggle="modal" data-bs-target="#verProductos" 
                    class="btn btn-primary fw-medium shadow-sm mb-2"> Ver todos los productos </button>
                     <!-- Opciones solo para admins -->
                     @can('editar almacenes')
                     <div class="d-flex">
                         <!-- Botón editar -->
                         <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#editar-{{ $almacen->id }}">
                             <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M11.9562 17.5358H18" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M11.15 3.66233C11.7964 2.88982 12.9583 2.77655 13.7469 3.40978C13.7905 3.44413 15.1912 4.53232 15.1912 4.53232C16.0575 5.05599 16.3266 6.16925 15.7912 7.01882C15.7627 7.06432 7.84329 16.9704 7.84329 16.9704C7.57981 17.2991 7.17986 17.4931 6.75242 17.4978L3.71961 17.5358L3.03628 14.6436C2.94055 14.2369 3.03628 13.8098 3.29975 13.4811L11.15 3.66233Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M9.68402 5.50073L14.2276 8.99" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                             </svg>
                         </a>
                     
                         <!-- Botón eliminar -->
                         <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $almacen->id }}">
                             <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M16.6041 8.39014C16.6041 8.39014 16.1516 14.0026 15.8891 16.3668C15.7641 17.496 15.0666 18.1576 13.9241 18.1785C11.7499 18.2176 9.57326 18.2201 7.39993 18.1743C6.30076 18.1518 5.61493 17.4818 5.49243 16.3726C5.22826 13.9876 4.77826 8.39014 4.77826 8.39014" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M17.7569 5.69963H3.62518" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M15.0339 5.69974C14.3797 5.69974 13.8164 5.23724 13.688 4.5964L13.4855 3.58307C13.3605 3.11557 12.9372 2.79224 12.4547 2.79224H8.92719C8.44469 2.79224 8.02136 3.11557 7.89636 3.58307L7.69386 4.5964C7.56552 5.23724 7.00219 5.69974 6.34802 5.69974" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                             </svg>
                         </a>
                     </div>
                     @endcan
                     
                    <!-- Modales -->
                    @include('components.modales.deleteAlmacen')
                    @include('components.modales.editAlmacen')  

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
