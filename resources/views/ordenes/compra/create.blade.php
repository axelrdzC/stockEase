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
                        <label for="numero_orden" class="form-label">Número de Orden</label>
                        <input type="text" name="numero_orden" id="numero_orden" class="form-control" required>
                    </div>
                    <!-- proveedor -->
                    <div class="mb-3">
                        <label for="proveedor_id" class="form-label">Proveedor</label>
                        <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div><div class="row mb-4">
                        <!-- estado -->
                        <div class="col-md-6">
                            <label for="estado" class="form-label">Estado</label>
                            <select name="estado" id="estado" class="form-select" required>
                                <option value="pendiente">Pendiente</option>
                                <option value="completada">Completada</option>
                                <option value="cancelada">Cancelada</option>
                            </select>
                        </div>
                        <!-- fecha -->
                        <div class="col-md-6">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required>
                        </div>
                    </div>
                    <!-- total -->
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" step="0.01" name="total" id="total" class="form-control" required>
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
