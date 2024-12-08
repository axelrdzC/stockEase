<div>
    <div class="col px-5">

        <!-- header de la seccion -->
        @section('titulo-seccion', 'Almacenes')
        @section('buscador', 'Escriba el nombre de un almacen aqui')
        @section('add-boton')
            <!-- add almacen -->
            @can('crear almacenes')
                <div class="col-2">
                    <div class="d-flex align-items-center">
                        <button type="button" onclick="window.location.href='{{ route('almacenes.create') }}'" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm">
                            Agregar almacen +
                        </button>
                    </div>
                </div>
            @endcan
        @endsection
        @include('components.tituloSeccion')
        
        <!-- contenedor (filtros / tabla) -->
        <div class="d-flex gap-4">
            <!-- Filtros -->
            <div class="d-flex h-100" style="width: 18rem;">
                <div class="card border-0 bg-white shadow-sm w-100">
                    <div class="card-body">
                        <h5 class="card-title">Filtros</h5>
                        <div class="mb-3">
                            <small class="form-label">ORDENAR POR</small>
                            <select wire:model.live="order" class="bg-white form-select selects">
                                <option value="">Seleccionar</option>
                                <option value="asc">Alfabético: A-Z</option>
                                <option value="desc">Alfabético: Z-A</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <small class="form-label">NIVEL DE OCUPACIÓN</small>
                            <select wire:model.live="capacidad" class="bg-white form-select selects">
                                <option value="">Seleccionar</option>
                                <option value="bajo">0%-25%</option>
                                <option value="medio">25%-50%</option>
                                <option value="alto">50%-75%</option>
                                <option value="lleno">75%-100%</option>
                            </select>
                        </div>
                        <button type="button" wire:click="resetFilters" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm mt-2">
                            Restablecer filtros
                        </button>
                    </div>
                </div>
            </div>
            <!-- Contenedor de almacenes -->
            <div class="container p-0 flex-grow-1">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($almacenes as $almacen)
                        <div class="col text-truncate">
                                <div class="card shadow-sm bg-white border-0 h-100">
                                    <a href=" {{ route( 'almacenes.show', $almacen ) }}" class="card-body d-flex flex-column p-0">
                                        <img src="{{ asset($almacen->img ?? 'storage/img/almacen.png') }}" alt="" 
                                        class="rounded-top-3" style="width: auto; height: 160px; object-fit: cover;">
                                    </a> 
                                    <div class="card-body d-flex flex-column">
                                        <h1 class="fs-5 fw-bold">{{ $almacen->nombre }}</h1>
                                        <small class="fs-6 fw-medium d-inline-block text-truncate">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            {{ $almacen->ubicacion }}
                                        </small>
                                        
                                        <div class="d-flex justify-content-center align-items-center mt-2 gap-3">
                                            <!-- Barra de progreso -->
                                            <div class="w-100 d-flex gap-2 align-items-center">
                                                <p class="fw-medium fs-6 m-0">{{ round($almacen->porcentaje, 2) }}%</p>
                                                <div class="progress w-100" role="progressbar" aria-valuenow="{{ $almacen->porcentaje }}" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar fs-6" style="width: {{ $almacen->porcentaje }}%;"></div>
                                                </div>
                                            </div>

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
                                        </div>

                                        <!-- Modales -->
                                        @include('components.modales.deleteAlmacen')
                                        @include('components.modales.editAlmacen')  
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>        
</div>
