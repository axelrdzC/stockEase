@extends('layouts.app')

@section('title', 'Agregar almacen')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Almacen</small>
        <h2 class="fw-bold namePaso">INFORMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="d-flex row w-75 p-4">
            <!-- columna / pasos -->
            <div class="col-3 bg-transparent">
                <ul class="list-group list-group-flush">
                    <li id="paso-item-1" class="list-group-item border-0 thisPaso rounded shadow-sm" data-name="INFORMACION GENERAL">
                        <small class="fw-normal">PASO 1</small>
                        <div class="titulo">INFORMACION GENERAL</div>
                    </li> 
                    <li id="paso-item-2" class="list-group-item border-0 bg-transparent text-muted" data-name="ESTRUCTURA">
                        <small class="fw-normal">PASO 2</small>
                        <div class="titulo">ESTRUCTURA</div>
                    </li>
                </ul> 
            </div>
            
            <!-- formulario -->
            <form id="form_x_pasos" method="POST" action="{{ route('almacenes.store') }}" enctype="multipart/form-data" class="col w-100 shadow-sm bg-white p-4 rounded">
            @csrf
                <!-- paso no. 1 -->
                <div id="paso_1" class="col">
                    <!-- nombre almacen -->
                    <div class="float-label position-relative mb-3">
                        <input type="text" class="form-control bg-white" id="nombre" placeholder=" " name="nombre" required>
                        <label for="nombre" class="form-label m-0">Nombre del almacen</label>
                    </div>
                    <!-- pais y estado -->
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
                    </div>
                    <!-- ciudad y CP -->
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
                    </div>
                    <!-- colonia / calles -->
                    <div class="float-label position-relative mb-3">
                        <input type="text" class="form-control bg-white" id="colonia" placeholder=" " name="colonia"  required>
                        <label for="colonia" class="form-label m-0">Colonia y calle</label>
                    </div>
                    <!-- subir img -->
                    <div class="mb-4">
                        <label for="img" class="form-label">Subir imagen</label>
                        <input type="file" class="form-control bg-white" id="img" name="img" accept="image/*">
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('almacenes.index') }}'">Regresar</button>
                        <button type="button" class="btn btn-primary flex-fill" onclick="nextStep(1,2)">Siguiente</button>
                    </div>
                </div>
                <!-- paso no. 2 -->
                <div id="paso_2" class="col" style="display:none;">
                    <!-- capacidad total -->
                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Capacidad total del almacen (unidades)</label>
                        <input type="number" class="form-control bg-white" id="capacidad" name="capacidad" required>
                    </div>
                    <!-- secciones (opc) -->
                    <div id="secciones-container">
                        <h2 class="mt-4">Seccionar</h2>
                        <p class="lh-sm">
                            Divida su almacen en pequenas secciones para tener un mejor control del almacenamiento interno.
                            Este paso es opcional y siempre puede crear secciones despues
                        </p>
                        <hr></hr>
                        <!-- seccion -->
                        <div class="row mb-2 seccion-field">
                            <div class="col-md-6">
                                <label for="seccion" class="form-label">Nombre de la seccion</label>
                                <input type="text" class="form-control bg-white" id="seccion_name" name="seccion">
                            </div>
                            <div class="col-md-6">
                                <label for="seccion_capacidad" class="form-label">Capacidad</label>
                                <input type="number" class="form-control bg-white 
                                @error('seccion_capacidad') is-invalid @enderror focus-ring input-blur" id="seccion_capacidad" name="seccion_capacidad">
                            </div>
                            @error('seccion_capacidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- add more secciones -->
                    <div class="d-flex mb-3">
                        <button type="button" class="text-primary fw-medium border-0 bg-transparent d-flex flex-grow-1" onclick="addSeccion()">
                            Agregar otra seccion +
                        </button>
                        <button type="button" class="btn btn-outline-danger p-0 px-2 align-items-end" onclick="removeSeccion(this)">Eliminar</button>
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" onclick="prevStep(2,1)">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
