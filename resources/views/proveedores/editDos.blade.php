@extends('layouts.app')

@section('title', 'Agregar proveedor')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Editar proveedor</small>
        <h2 class="fw-bold">UBICACION</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="d-flex gap-3 w-75 p-4">
            <div class="col-3 bg-transparent">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent text-muted">
                        <div class="small fw-normal">PASO  1</div>
                        <div>INFORMACION GENERAL</div>
                    </li>
                    <li class="list-group-item bg-white fw-bold rounded shadow-sm">
                        <div class="small fw-normal">PASO 2</div>
                        <div class="text-primary">UBICACION</div>
                    </li>
                </ul> 
            </div>
            <div class="col">
                <!-- formulario -->
                <form method="POST" action="{{ route('proveedores.updateDos', $proveedor) }}" class="shadow-sm bg-white p-4 rounded w-100">
                    @csrf @method('PATCH')
                    <!-- pais y estado 
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pais" class="form-label">País</label>
                            <select class="form-select bg-white" id="pais" name="pais" required>
                                <option selected disabled>Selecciona un país</option>
                                <option value="México">México</option>
                                <option value="Estados Unidos">Estados Unidos</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select bg-white" id="estado" name="estado" required>
                                <option selected disabled>Selecciona un estado</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Nuevo Leon">Nuevo León</option>
                            </select>
                        </div>
                    </div> -->
                    <!-- ciudad y CP 
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <select class="form-select bg-white" id="ciudad" name="ciudad" required>
                                <option selected disabled>Selecciona una ciudad</option>
                                <option value="Ciudad Victoria">Ciudad Victoria</option>
                                <option value="Tampico">Tampico</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="codigo_p" class="form-label">Código Postal</label>
                            <input type="number" class="form-control bg-white" id="codigo_p" name="codigo_p" required>
                        </div>
                    </div> -->
                    <!-- direccion e email -->
                    <div class="mb-3">
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text" class="form-control bg-white" id="direccion" name="direccion" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo</label>
                            <input type="text" class="form-control bg-white" id="email" name="email" required>
                        </div>
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('proveedores.create.general') }}'">Regresar</button>
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
