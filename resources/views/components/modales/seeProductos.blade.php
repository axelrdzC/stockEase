<!-- Scrollable modal -->
<div class="modal fade" id="verProductos">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Lista de productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    @foreach ($productos as $producto)
                        <div class="card shadow-sm bg-white border-0 m-0 mb-3">
                            <div class="card-body d-flex align-items-center gap-4 px-4">
                                <div class="col-1 p-0">
                                    <img src="{{asset($producto->img ?? 'storage/img/producto.jpeg') }}" alt="" 
                                    class="w-100" style="height: 6em; object-fit: cover;">
                                </div>
                                <div class="d-flex flex-column" style="width: 18rem;">
                                    <h1 class="fs-5 fw-bold d-inline-block text-truncate pe-5">{{ $producto->nombre }}</h1>
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
</div>