@extends('layouts.app')

@section('title', 'Agregar Orden de Compra')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Generar Orden de Compra</small>
        <h2 class="fw-bold">INFORMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row w-75 p-4">
            <div class="col-md-8 mx-auto">
                <!-- formulario -->
                <form method="POST" action="{{ route('ordenes.compra.store') }}" class="shadow-sm bg-white p-4 rounded">
                    @csrf
                    <!-- numero orden -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre (opcional)</label>
                        <input type="text" name="nombre" id="nombre" class="form-control bg-white" required>
                    </div>

                    <!-- proveedor -->
                    <div class="mb-3">
                        <label for="proveedor_id" class="form-label">Proveedor</label>
                        <select name="proveedor_id" id="proveedor_id" class="form-select bg-white" required>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Selección de producto único -->
                    <div class="row mb-4">
                        <div class="col-md-6" id="productos-container" style="display: none;">
                            <label for="producto_id" class="form-label">Producto</label>
                            <select name="producto_id" id="producto_id" class="form-select bg-white" required>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" data-proveedor="{{ $producto->proveedor_id }}">
                                        {{ $producto->nombre }} - ${{ $producto->precio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="cantidad" class="form-label">Especifique la cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control bg-white" placeholder="Ejemplo: 2, 5, 3" required>
                        </div>
                    </div>

                    <!-- estado -->
                    <div class="mb-4">
                        <label for="fecha" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-select bg-white" required>
                            <option value="completada"> Completada </option>
                            <option value="cancelada"> Cancelada </option>
                            <option value="pendiente"> Pendiente </option>
                        </select>
                    </div>

                    <!-- estado -->
                    <div class="mb-4">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" required>
                    </div>
                    
                    <!-- tipo (hidden) -->
                    <div class="mb-3">
                        <input type="hidden" id="tipo" value="compra" required>
                    </div>

                    <!-- total (hidden) -->
                    <div class="mb-3">
                        <input type="hidden" id="total" value="" required>
                    </div>
                    
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('ordenes.compra.index') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
