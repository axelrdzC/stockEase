<!-- modal scroll POR SECCION -->
<div class="modal fade" id="productos-secc-{{ $seccion->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Lista de productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-2">
                <nav class="navbar mb-4 align-items-center bg-primary d-none" id="checkboxChoices">
                    <!-- div para las opciones al seleccionar varios productos -->
                    <div class="d-flex w-100 px-3 py-2 justify-content-end align-items-center gap-2">

                        <span id="productosSeleccionados" class="fw-bold text-white flex-grow-1 ms-3">
                            0 productos seleccionados
                        </span>

                        <form method="POST" action="{{ route('productos.destroyAll') }}" id="destroyAll">
                            @csrf @method('DELETE')
                            <input type="hidden" class="productos-seleccionados-input" name="productos_seleccionados" value="">
                            <button type="submit" class="btn btn-outline-light" id="destroyAll-btn" disabled>Eliminar</button>
                        </form>

                        <div class="btn-group">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="moveSectionDropdown" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                                Mover de sección
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="moveSectionDropdown">
                                <!-- Opción para nueva sección -->
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#crear-{{ $almacen->id }}">Nueva sección</a>
                                </li>
                                <!-- Opción para sección existente -->
                                @foreach ($secciones as $seccion)
                                    <li>
                                        <form method="POST" action="{{ route('productos.moveToSection', $seccion) }}">
                                            @csrf
                                            <!-- Campo oculto con un identificador único -->
                                            <input type="hidden" class="productos-seleccionados-input" name="productos_seleccionados" value="">
                                            <button type="submit" class="dropdown-item">{{ $seccion->nombre }}</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="moveAlmacenDropdown" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                                Mover de almacen
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="moveAlmacenDropdown">
                                @foreach ($almacenes as $almacen)
                                    <li>
                                        <form method="POST" action="{{ route('productos.moveToAlmacen', $almacen) }}">
                                            @csrf
                                            <input type="hidden" class="productos-seleccionados-input" name="productos_seleccionados" value="">
                                            <button type="submit" class="dropdown-item">{{ $almacen->nombre }}</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </nav>

                <div class="col d-flex flex-column gap-3">
                    @foreach ($productos as $producto)
                        @if ($producto->seccion_id == $seccion->id) 
                            <div class="card rounded bg-white border-0 shadow-sm m-0">
                                <div class="card-body d-flex align-items-center gap-4 px-4">
                                    <div class="form-check">
                                        <input class="form-check-input producto-checkbox" type="checkbox" value="{{ $producto->id }}" id="producto-{{ $producto->id }}" name="productos[]">
                                    </div>
                                    <div class="col-1 p-0">
                                        <img src="{{asset($producto->img ?? 'storage/img/producto.jpeg') }}" alt="" 
                                        class="w-100" style="height: 4em; object-fit: cover;">
                                    </div>
                                    <div class="d-flex flex-column" style="width: 17rem;">
                                        <h1 class="fs-5 fw-bold d-inline-block text-truncate pe-5">{{ $producto->nombre }}</h1>
                                        <div class="d-flex gap-2">
                                            <small class="fw-medium text-white rounded bg-primary p-1 px-2">{{ $producto->categoria->nombre }}</small>
                                            <small class="rounded bg-white border border-secondary-subtle p-1 px-2">
                                                Cantidad en stock: <span class="fw-medium">{{ $producto->cantidad_producto }}</span>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-1">
                                        <div class="col-6">
                                            <small class="row">Precio unitario</small>
                                            <small class="row fs-6 fw-bold">$ {{ $producto->precio }}</small>
                                        </div>
                                        <div class="col-6">
                                            <small class="row">Codigo SKU</small>
                                            <small class="row fs-6 fw-bold">{{ $producto->SKU }}</small>
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
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>