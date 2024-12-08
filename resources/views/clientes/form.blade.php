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
                    <li id="paso-item-2" class="list-group-item border-0 bg-transparent text-muted" data-name="CONTACTO">
                        <small class="fw-normal">PASO 2</small>
                        <div class="titulo">CONTACTO</div>
                    </li>
                </ul> 
            </div>
            <!-- formulario -->
            <form @yield('action') method="POST" class="shadow-sm bg-white p-4 rounded w-100" enctype="multipart/form-data" novalidate>
                @yield('method')
                @csrf
                <!-- Mostrar errores globales -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- paso no. 1 -->
                <div id="paso_1" class="col">
                    <!-- nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del cliente</label>
                        <input 
                            type="text" 
                            class="form-control bg-white @error('nombre') is-invalid @enderror" 
                            id="nombre" 
                            name="nombre" 
                            value="{{ old('nombre', $cliente->nombre ?? '') }}"
                        >
                        @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- tipo -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="d-flex">                            
                                <label for="tipo" class="form-label">Tipo</label>
                                <a href="#" class="text-primary fw-medium d-flex flex-grow-1 link-underline link-underline-opacity-0 justify-content-end" data-bs-toggle="modal" data-bs-target="#addTipo">
                                    Agregar un tipo +
                                </a>
                            </div>
                            <select 
                                class="form-select bg-white @error('tipo') is-invalid @enderror" 
                                id="tipo" 
                                name="tipo"
                            >
                                <option selected disabled>Selecciona un tipo de cliente</option>
                                @foreach ($categorias as $categoria)
                                    @if ($categoria->tipo == 'persona')
                                    <option 
                                    value="{{ $categoria->nombre }}" 
                                    {{ old('tipo', $cliente->tipo ?? '') == $categoria->nombre ? 'selected' : '' }}
                                    >
                                    {{ $categoria->nombre }}
                                </option>

                                    @endif
                                @endforeach
                            </select>
                            @error('tipo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- categoria -->
                        <div class="col-md-6">
                            <div class="d-flex">                            
                                <label for="categoria_id" class="form-label">Categoría</label>
                                <a href="#" class="text-primary fw-medium d-flex flex-grow-1 link-underline link-underline-opacity-0 justify-content-end" data-bs-toggle="modal" data-bs-target="#addCategoria">
                                    Agregar una categoría +
                                </a>
                            </div>
                            <select 
                                class="form-select bg-white @error('categoria_id') is-invalid @enderror" 
                                id="categoria_id" 
                                name="categoria_id"
                            >
                                <option selected disabled>Selecciona una categoría</option>
                                @foreach ($categorias as $categoria)
                                    @if ($categoria->tipo == 'producto')
                                        <option 
                                            value="{{ $categoria->id }}" 
                                            {{ old('categoria_id', $cliente->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}
                                        >
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('categoria_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- imagen -->
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
                                <img src="{{ asset($cliente->img) }}" alt="Imagen del cliente" class="rounded" style="max-width: 37px;">
                            @endisset
                            <input 
                                type="file" 
                                class="form-control bg-white @error('img') is-invalid @enderror" 
                                id="img" 
                                name="img" 
                                accept="image/*"
                            >
                            @error('img')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('clientes.index') }}'">Regresar</button>
                        <!-- Este botón no envía el formulario, solo avanza al paso 2 -->
                        <button type="button" class="btn btn-primary flex-fill" onclick="nextStep(1,2)">Siguiente</button>
                    </div>
                </div>
                <div id="paso_2" class="col" style="display:none;">
                    <!-- dirección -->
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Ubicación</label>
                        <input 
                            type="text" 
                            class="form-control bg-white @error('direccion') is-invalid @enderror" 
                            id="direccion" 
                            name="direccion" 
                            value="{{ old('direccion', $cliente->direccion ?? '') }}"
                        >
                        @error('direccion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- teléfono y correo -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input 
                                type="text" 
                                class="form-control bg-white @error('telefono') is-invalid @enderror" 
                                id="telefono" 
                                name="telefono" 
                                value="{{ old('telefono', $cliente->telefono ?? '') }}"
                            >
                            @error('telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo</label>
                            <input 
                                type="email" 
                                class="form-control bg-white @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', $cliente->email ?? '') }}"
                            >
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- Este botón sí envía el formulario -->
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Si existen errores en campos del paso 2 (telefono o email), mostrar directamente el paso 2
        @if($errors->has('telefono') || $errors->has('email'))
            nextStep(1,2);
        @endif
    });
</script>

@endsection
