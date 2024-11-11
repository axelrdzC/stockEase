@extends('layouts.app')

@section('title', 'Agregar producto')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Editar Producto</small>
        <h2 class="fw-bold">INFROMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="row p-4"> <!-- 
            <div class="col-md-4 bg-transparent">
                vista de la lista de pasos
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-white fw-bold rounded shadow-sm">
                        <div class="small fw-normal">PASO 1</div>
                        <div class="text-primary">INFORMACION GENERAL</div>
                    </li>
                    <li class="list-group-item bg-transparent text-muted">
                    <div class="small fw-normal">PASO 2</div>
                        <div>INFORMACION MONETARIA</div>
                    </li>
                    <li class="list-group-item bg-transparent text-muted">
                    <div class="small fw-normal">PASO 3</div>
                        <div>UBICACION Y CANTIDAD</div>
                    </li>
                </ul> 
            </div>-->
            <div class="col">
                <!-- formulario -->
                <form method="POST" action="{{ route('productos.update', $producto) }}" class="shadow-sm bg-white p-4 rounded" style="width: 50rem;">
                    @csrf @method('PATCH')
                    <!-- nombre producto -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" required value="{{ $producto->nombre }}">
                    </div>
                    <!-- proveedor -->
                    <div class="mb-3">
                        <label for="proveedor" class="form-label">Nombre del proveedor</label>
                            <select class="form-select bg-white" id="proveedor" name="proveedor" required>
                                <option selected disabled>Selecciona un proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                    </div>
                    <!-- sku y categoria -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Codigo SKU</label>
                            <input disabled type="text" class="form-control bg-white" value="{{ $producto->SKU }}">
                        </div>
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoria</label>
                            <select class="form-select bg-white" id="categoria" name="categoria" required>
                                <option selected disabled>Selecciona una categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- precio y unidad -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tipo" class="form-label">Precio unitario</label>
                            <input type="number" class="form-control bg-white" id="precio" name="precio" required value="{{ $producto->precio }}">
                        </div>
                        <div class="col-md-6">
                            <label for="unidad_medida" class="form-label">Unidad de medida</label>
                            <input type="number" class="form-control bg-white" id="unidad_medida" name="unidad_medida" required value="{{ $producto->unidad_medida }}">
                        </div>
                    </div>
                    <!-- desc -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control bg-white" id="descripcion" name="descripcion" rows="3" required>{{ $producto->descripcion }}
                        </textarea>
                    </div>
                    <!-- cant y almacen -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cantidad_producto" class="form-label">Cantidad de unidades</label>
                            <input type="number" class="form-control bg-white" id="cantidad_producto" name="cantidad_producto" required value="{{ $producto->cantidad_producto }}">
                        </div>
                        <div class="col-md-6">
                            <label for="almacen" class="form-label">Almacen</label>
                            <select class="form-select bg-white" id="almacen" name="almacen" required>
                                <option selected disabled>Selecciona un almacen</option>
                                @foreach ($almacenes as $almacen)
                                    <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- subir img -->
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Subir imagen</label>
                        <input type="file" class="form-control bg-white" id="imagen" name="imagen" accept="image/*">
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('productos.index') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
