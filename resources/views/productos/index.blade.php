@extends('layouts.app')

@section('title', 'Productos') 

@section('content')
 <div class="col px-5">
    <!-- header de la seccion -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="fs-2 fw-semibold">{{ __('Productos') }}</div>
        </div>
        <!-- buscador -->
        <div class="col-md-4 p-0">
            <div class="d-flex p-0 gap-2">
                <form class="d-flex position-relative w-100" role="search">
                    <input class="form-control border-secondary px-4 p-2 bg-white border-0 shadow-sm" 
                        type="search" placeholder="Busca algun producto" aria-label="Search">
                    <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent me-2" type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.0183 18.4851L21.5423 22" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <!-- add producto -->
        <div class="col-2">
            <div class="d-flex align-items-center">
                <button type="button" onclick="window.location.href='{{ route('productos.create.general') }}'" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm">
                    Agregar producto +
                </button>
            </div>
        </div>
    </div>
    <!-- contenedor productos -->
    <div class="row d-flex gap-4">
        <!-- filtros -->
        <div class="d-flex" style="width: 18rem;">
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
                    <small for="filterCategory" class="form-label">CATEGORIA</small>
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
                    <small for="filterPrice" class="form-label">PRECIO</small>
                    <select id="filterPrice" class="form-select selects">
                        <option selected>Seleccionar</option>
                        <option value="1">$0 - $50</option>
                        <option value="2">$50 - $100</option>
                        <option value="3">$100 - $200</option>
                    </select>
                </div>
                <!-- filtro por Stock -->
                <div class="mb-3">
                    <small for="filterStock" class="form-label">ESTADO DE STOCK</small>
                    <select id="filterStock" class="form-select selects">
                        <option selected>Seleccionar</option>
                        <option value="1">ALTO</option>
                        <option value="1">NORMAL</option>
                        <option value="1">BAJO</option>
                        <option value="2">AGOTADO</option>
                    </select>
                </div>
                <!-- boton reset filtros -->
                <button type="button" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm mt-2">
                    <svg width="25" height="24" class="nav-icon me-2" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.8301 16.5928H4.52942" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.6405 6.90042H19.9412" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.22629 6.84625C9.22629 5.5506 8.16813 4.5 6.86314 4.5C5.55816 4.5 4.5 5.5506 4.5 6.84625C4.5 8.14191 5.55816 9.19251 6.86314 9.19251C8.16813 9.19251 9.22629 8.14191 9.22629 6.84625Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 16.5538C20.5 15.2581 19.4426 14.2075 18.1376 14.2075C16.8318 14.2075 15.7737 15.2581 15.7737 16.5538C15.7737 17.8494 16.8318 18.9 18.1376 18.9C19.4426 18.9 20.5 17.8494 20.5 16.5538Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Restablecer filtros
                </button>
            </div>
        </div>
        </div>
        <!-- tabla d productos -->
        <div class="d-flex flex-grow-1 w-50">
            <div class="row w-100 gap-2">
                @foreach ($productos as $producto)
                    <div class="card shadow-sm bg-white border-0 m-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="d-flex flex-column w-50">
                                <h1 class="fs-5 fw-bold">{{ $producto->id }}. {{ $producto->nombre }}</h1>
                                <div class="d-flex gap-2">
                                    <small class="fw-medium text-white rounded bg-primary p-1 px-2">{{ $producto->categoria->nombre }}</small>
                                    <small class="rounded bg-white border border-secondary-subtle p-1 px-2">
                                        Cantidad en stock: <span class="fw-medium">{{ $producto->cantidad_producto }}</span>
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex flex-grow-1">
                                <div class="col-4">
                                    <small class="row">Precio unitario</small>
                                    <small class="row fs-6 fw-bold">$ {{ $producto->precio }}</small>
                                </div>
                                <div class="col-4">
                                    <small class="row">Codigo SKU</small>
                                    <small class="row fs-6 fw-bold">{{ $producto->SKU }}</small>
                                </div>
                                <div class="col-4">
                                    <small class="row">Ubicacion</small>
                                    <small class="row fs-6 fw-bold">{{ $producto->almacen->nombre }}</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <!-- ver mas opcs -->
                                <div class="dropdown">
                                    <button type="button" class="btn rounded-3 border-2 btn-outline-secondary p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="svgs">
                                            <path d="M26.5657 20.0217H26.5807" stroke="#53545C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M19.884 20.0217H19.899" stroke="#53545C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.2023 20.0217H13.2173" stroke="#53545C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Ver</a></li>
                                        <li><a class="dropdown-item" href="{{ route('productos.edit', $producto) }}">Editar</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $producto->id }}">Eliminar</a></li>
                                    </ul>
                                        <!-- el modal aka mensajito de confirmacion -->
                                        <div class="modal fade" id="eliminar-{{ $producto->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirme su accion</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="">Esta seguro de querer borrar el siguiente producto: </p>
                                                    <p class="m-0"> ID: {{ $producto->id }} </p>
                                                    <p class="m-0"> Nombre: {{ $producto->nombre }} </p>
                                                    <p class="m-0"> SKU: {{ $producto->SKU }} </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary">Eliminar producto</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
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
