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
            <form id="form_x_pasos" method="POST" action="{{ route('almacenes.store') }}" class="col w-100 shadow-sm bg-white p-4 rounded">
            @csrf
                <!-- paso no. 1 -->
                <div id="paso_1" class="col">
                    <!-- nombre almacen -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del almacen</label>
                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" required>
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
                    <div class="mb-3">
                        <label for="colonia" class="form-label">Colonia y calle</label>
                        <input type="text" class="form-control bg-white" id="colonia" name="colonia" required>
                    </div>
                    <!-- subir img -->
                    <div class="mb-4">
                        <label for="imagen" class="form-label">Subir imagen</label>
                        <input type="file" class="form-control bg-white" id="imagen" name="imagen" accept="image/*">
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
                        <label for="capacidad_total" class="form-label">Capacidad total del almacen</label>
                        <input type="number" class="form-control bg-white" id="capacidad_total" name="capacidad_total" required>
                    </div>
                    <!-- secciones (opc) -->
                    <div id="secciones-container">
                        <!-- seccion -->
                        <div class="row mb-2 seccion-field">
                            <div class="col-md-6">
                                <label for="seccion_name" class="form-label">Nombre de la seccion</label>
                                <input type="text" class="form-control bg-white" id="seccion_name" name="seccion_name">
                            </div>
                            <div class="col-md-6">
                                <label for="seccion_capacidad" class="form-label">Capacidad</label>
                                <input type="text" class="form-control bg-white" id="seccion_capacidad" name="seccion_capacidad">
                            </div>
                        </div>
                    </div>
                    <!-- add more secciones -->
                    <div class="mb-3">
                        <button type="button" class="text-primary fw-medium border-0 bg-transparent" onclick="addSeccion()">
                            Agregar otra seccion +
                        </button>
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

<script>

    function makeUbicacion() {
        const pais = document.getElementById('pais').value
        const estado = document.getElementById('estado').value
        const ciudad = document.getElementById('ciudad').value
        const codigo_p = document.getElementById('codigo_p').value
        const colonia = document.getElementById('colonia').value

        const ubicacion = `${ciudad} ${estado}, ${pais}.  ${calle}, CP. ${codigoPostal}`.trim()
        document.getElementById('ubicacion').value = ubicacion
    }

    document.getElementById('pais').addEventListener('input', actualizarDireccionCompleta)
    document.getElementById('estado').addEventListener('input', actualizarDireccionCompleta)
    document.getElementById('ciudad').addEventListener('input', actualizarDireccionCompleta)
    document.getElementById('codigo_postal').addEventListener('input', actualizarDireccionCompleta)
    document.getElementById('calle').addEventListener('input', actualizarDireccionCompleta)

    function updateFileName(input) {
        const fileText = document.querySelector('.file-text');
        if (input.files && input.files[0]) {
            fileText.innerHTML = input.files[0].name + ". ";
            const link = document.createElement("a");
            link.className = "text-primary fw-bold link-underline link-underline-opacity-0";
            link.href = "#";
            link.textContent = "Cambiar imagen";
            link.onclick = (e) => { e.preventDefault(); input.click(); };
            fileText.appendChild(link);
        }
    }

</script>
@endsection
