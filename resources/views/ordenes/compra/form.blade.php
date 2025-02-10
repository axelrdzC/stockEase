@extends('layouts.app')

@section('title')
    @yield('formName')
@endsection

@section('content')

    <div class="col px-5">
        <div class="text-center">
            <small class="text-muted fs-6">@yield('crudAction')</small>
            <h2 class="fw-bold namePaso">INFORMACION GENERAL</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-flex gap-3 w-75 p-4">
                <!-- formulario -->
                <form @yield('action') method="POST" class="shadow-sm bg-white p-4 rounded w-100" enctype="multipart/form-data">
                    @yield('method')
                    @csrf
                    <div class="col">
                        <!-- numero de orden -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Número de Orden</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $orden->nombre }}" required>
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
                        <!-- botones -->
                        <div class="d-flex justify-content-between gap-3">
                            <button type="button" class="btn btn-light flex-fill border"
                                    onclick="window.location.href='{{ route('ordenes.compra.index') }}'">Regresar</button>
                            <button type="submit" class="btn btn-primary flex-fill">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
