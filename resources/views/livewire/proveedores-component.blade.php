<div>
    <div class="col px-5">
        <!-- header de la seccion -->
        <div class="row align-items-center mb-4">
            <div class="col">
                <div class="fs-2 fw-semibold">{{ __('Proveedores') }}</div>
            </div>
            <!-- buscador -->
            <div class="col-md-4 p-0">
                <div class="d-flex p-0 gap-2">
                    <form class="d-flex position-relative w-100" role="search">
                        <input class="form-control border-secondary px-4 p-2 bg-white border-0 shadow-sm" 
                            type="search" wire:model.live="search" placeholder="Busca algun proveedor" aria-label="Search">
                        <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent me-2" type="button">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.0183 18.4851L21.5423 22" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <!-- add proveedor -->
            <div class="col-2">
                <div class="d-flex align-items-center">
                    <button type="button" onclick="window.location.href='{{ route('proveedores.create') }}'" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm">
                        Agregar proveedor +
                    </button>
                </div>
            </div>
        </div>
        <!-- contenedor Proveedores -->
        <div class="d-flex gap-4">
            <!-- filtros -->
            <div class="d-flex h-100" style="width: 18rem;">
                <div class="card border-0 bg-white shadow-sm w-100">
                    <div class="card-body">
                        <h5 class="card-title">Filtros</h5>
                        <!-- filtro orden abc -->
                        <div class="mb-3">
                            <small class="form-label">ORDENAR POR</small>
                            <select wire:model.live="order" class="form-select selects">
                                <option value="">Seleccionar</option>
                                <option value="asc">ALFABETICO: A-Z</option>
                                <option value="desc">ALFABETICO: Z-A</option>
                            </select>
                        </div>
                        <!-- filtro por tipo -->
                        <div class="mb-3">
                            <small class="form-label">CATEGORÍA</small>
                            <select wire:model.live="category" class="form-select selects">
                                <option value="">Seleccionar</option>
                                @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach 
                            </select>
                        </div>
                        <!-- boton reset filtros -->
                        <button type="button" wire:click="resetFilters" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm mt-2">
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
            <!-- tabla d proveedores -->
            <div class="container p-0 flex-grow-1">
                <div class="col">
                    @foreach ($proveedores as $proveedor)
                        <div class="card shadow-sm bg-white border-0 m-0 mb-3">
                            <div class="card-body d-flex align-items-center gap-4 px-4">
                                <div class="col-1 p-0">
                                    <img src="{{ asset($proveedor->img) }}" alt="" class="w-100 rounded-circle">
                                </div>
                                <div class="d-flex flex-column" style="width: 18rem;">
                                    <div class="d-flex flex-column">
                                        <h1 class="fs-5 fw-bold">{{ $proveedor->nombre }}</h1>
                                        <div class="d-flex gap-2">
                                            <small class="fw-medium text-white rounded bg-primary p-1 px-2">{{ $proveedor->categoria->nombre }}</small>
                                            <small class="rounded bg-white border border-secondary-subtle p-1 px-2">
                                                Cantidad en stock: <span class="fw-medium">{{ $proveedor->productos->sum('cantidad_producto') }}</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1">
                                    <div class="col-4">
                                        <small class="row">Correo</small>
                                        <small class="row fs-6 fw-bold">{{ $proveedor->email }}</small>
                                    </div>
                                    <div class="col-4">
                                        <small class="row">Direccion</small>
                                        <small class="row fs-6 fw-bold">
                                            <span class="d-inline-block text-truncate p-0" style="max-width: 150px;">
                                                {{ $proveedor->direccion }}
                                            </span>
                                        </small>
                                    </div>
                                    <div class="col-4">
                                        <small class="row">Teléfono</small>
                                        <small class="row fs-6 fw-bold">{{ $proveedor->telefono }}</small>
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
                                            <li><a class="dropdown-item" href="{{ route('proveedores.edit', $proveedor) }}">Editar</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $proveedor->id }}">Eliminar</a></li>
                                        </ul>
                                        <!-- Modal -->
                                        <div class="modal fade" id="eliminar-{{ $proveedor->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Eliminar Proveedor</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Está seguro de que desea eliminar el proveedor <strong>{{ $proveedor->nombre }}</strong>?</p>
                                                            <p>Esto también eliminará <strong>{{ $proveedor->productos->count() }}</strong> productos asociados.</p>
                                                            <p>&emsp;Con una cantidad de <strong>{{ $proveedor->productos->sum('cantidad_producto') }}</strong> unidades.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </div>
                                                    </div>
                                                </form>
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
</div>
