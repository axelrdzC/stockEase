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
                <!-- columna / pasos -->
                <div class="col-3 bg-transparent">
                    <ul class="list-group list-group-flush">
                        <li id="paso-item-1" class="list-group-item border-0 thisPaso rounded shadow-sm" data-name="INFORMACION GENERAL">
                            <small class="fw-normal">PASO 1</small>
                            <div class="titulo">INFORMACION GENERAL</div>
                        </li>
                        <li id="paso-item-2" class="list-group-item border-0 bg-transparent text-muted" data-name="UBICACION">
                            <small class="fw-normal">PASO 2</small>
                            <div class="titulo">UBICACION</div>
                        </li>
                    </ul> 
                </div>
                <!-- formulario -->
                <form @yield('action') method="POST" class="shadow-sm bg-white p-4 rounded w-100" enctype="multipart/form-data">
                    @yield('method')
                    @csrf
                    <!-- paso no. 1 -->
                    <div id="paso_1" class="col">
                        <!-- nombre producto -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del clientes</label>
                            <input type="text" class="form-control bg-white" id="nombre" name="nombre" 
                            @isset($cliente) value="{{ $cliente->nombre }}" @endisset required>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control bg-white" id="telefono" name="telefono"
                            @isset($cliente) value="{{ $cliente->telefono }}" @endisset required>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">                            
                                    <label for="categoria_id" class="form-label">Categoria</label>
                                    <a href="#" class="text-primary fw-medium d-flex flex-grow-1 link-underline link-underline-opacity-0 justify-content-end" data-bs-toggle="modal" data-bs-target="#addCategoria">
                                        Agregar una categoría +
                                    </a>
                                </div>
                                <select class="form-select bg-white" id="categoria_id" name="categoria_id" required>
                                    <option selected disabled>Selecciona una categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option 
                                            value="{{ $categoria->id }}" 
                                            @isset($cliente) 
                                                {{ $categoria->id == $cliente->categoria_id ? 'selected' : '' }} 
                                            @endisset>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- subir img -->
                        <div class="mb-4">
                            <label for="img" class="form-label">
                                @isset($cliente->img)
                                    Reemplazar imagen
                                @else
                                    Subir imagen
                                @endisset
                            </label>
                            <div class="d-flex align-items-center gap-2">
                                @isset($cliente->img)
                                    <img src="{{ asset($cliente->img) }}" alt="Imagen del proveedor" class="rounded" style="max-width: 37px;">
                                @endisset
                                <input type="file" class="form-control bg-white" id="img" name="img" accept="image/*">
                            </div>
                        </div>
                        <!-- botones -->
                        <div class="d-flex justify-content-between gap-3">
                            <button type="button" class="btn btn-light flex-fill border" 
                                onclick="window.location.href='{{ route('clientes.index') }}'">Regresar</button>
                            <button type="button" class="btn btn-primary flex-fill" onclick="nextStep(1,2)">Siguiente</button>
                        </div>
                    </div>
                    <div id="paso_2" class="col" style="display:none;">
                        <!-- direccion e email -->
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Ubicacion</label>
                            <input type="text" class="form-control bg-white" id="direccion" name="direccion"
                            @isset($cliente) value="{{ $cliente->direccion }}" @endisset required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="text" class="form-control bg-white" id="email" name="email"
                            @isset($cliente) value="{{ $cliente->email }}" @endisset required>
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

    <!-- el modal aka formulario add categoria -->
    @include('components.modales.addCategoria')
    
@endsection