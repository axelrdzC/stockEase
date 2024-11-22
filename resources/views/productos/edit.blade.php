@extends('layouts.app')

@section('title', 'Agregar producto')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Editar Producto</small>
        <h2 class="fw-bold">INFORMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="row p-4">
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
                    <div class="mb-4">
                        <div class="d-flex">                            
                            <label for="proveedor_id" class="form-label">Nombre del proveedor</label>
                            <a href="{{ route('proveedores.create') }}" class="text-primary fw-medium col link-underline link-underline-opacity-0 d-flex flex-grow-1 justify-content-end">
                                Agregar un proveedor +
                            </a>
                        </div>
                            <select class="form-select bg-white" id="proveedor_id" name="proveedor_id" required>
                                <option selected disabled>Selecciona un proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" {{ $proveedor->id == $producto->proveedor_id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
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
                            <div class="row">                            
                                <label for="categoria_id" class="form-label col">Categoria</label>
                                <a href="#" class="text-primary fw-medium col link-underline link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#addCategoria">
                                    Agregar una categoría +
                                </a>
                            </div>
                            <select class="form-select bg-white" id="categoria_id" name="categoria_id" required>
                                <option selected disabled>Selecciona una categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
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
                            <label for="almacen_id" class="form-label">Almacen</label>
                            <select class="form-select bg-white" id="almacen_id" name="almacen_id" required>
                                <option selected disabled>Selecciona un almacen</option>
                                @foreach ($almacenes as $almacen)
                                    <option value="{{ $almacen->id }}" {{ $almacen->id == $producto->almacen_id ? 'selected' : '' }}>{{ $almacen->nombre }}</option>
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

<!-- el modal aka formulario add categoria -->
@include('components.modales.addCategoria')

@endsection
