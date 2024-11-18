@extends('layouts.app')

@section('title', 'Editar Orden de Compra')

@section('content')
<div class="col px-5">
    <h2 class="fw-bold mb-4">Editar Orden de Compra</h2>
    <form action="{{ route('ordenes.update', $orden) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="numero_orden" class="form-label">Número de Orden</label>
            <input type="text" name="numero_orden" id="numero_orden" class="form-control" value="{{ $orden->numero_orden }}" required>
        </div>
        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}" {{ $proveedor->id == $orden->proveedor_id ? 'selected' : '' }}>
                        {{ $proveedor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="pendiente" {{ $orden->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="completada" {{ $orden->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                <option value="cancelada" {{ $orden->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $orden->fecha }}" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" value="{{ $orden->total }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
