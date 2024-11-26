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
                        <li id="paso-item-2" class="list-group-item border-0 bg-transparent text-muted" data-name="INFORMACION MONETARIA">
                            <small class="fw-normal">PASO 2</small>
                            <div class="titulo">INFORMACION MONETARIA</div>
                        </li>
                        <li id="paso-item-3" class="list-group-item border-0 bg-transparent text-muted" data-name="UBICACION Y CANTIDAD">
                            <small class="fw-normal">PASO 3</small>
                            <div class="titulo">UBICACION Y CANTIDAD</div>
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
                            <label for="nombre" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control bg-white" id="nombre" name="nombre" 
                            @isset($producto) value="{{ $producto->nombre }}" @endisset required>
                        </div>
                        <!-- proveedor -->
                        <div class="mb-4">
                            <div class="row">                            
                                <label for="proveedor_id" class="form-label col-8">Nombre del proveedor</label>
                                <a href="{{ route('proveedores.create') }}" class="text-primary fw-medium col link-underline link-underline-opacity-0 d-flex flex-grow-1 justify-content-end">
                                    Agregar un proveedor +
                                </a>
                            </div>
                            <select class="form-select bg-white" id="proveedor_id" name="proveedor_id" required>
                                <option selected disabled>Selecciona un proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                        <option 
                                            value="{{ $proveedor->id }}" 
                                            @isset($producto) 
                                                {{ $proveedor->id == $producto->proveedor_id ? 'selected' : '' }} 
                                            @endisset>
                                            {{ $proveedor->nombre }}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- sku y categoria -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="sku" class="form-label">Codigo SKU</label>
                                <input type="text" class="form-control bg-white" id="sku" name="sku"
                                    @isset($producto)
                                        value="{{ $producto->SKU }}"
                                        disabled
                                    @endisset
                                    @empty($producto)
                                        required
                                    @endempty>
                                
                                @isset($producto)
                                    <input type="hidden" name="sku" value="{{ $producto->SKU }}">
                                @endisset
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
                                            @isset($producto) 
                                                {{ $categoria->id == $producto->categoria_id ? 'selected' : '' }} 
                                            @endisset>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- desc -->
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea class="form-control bg-white" id="descripcion" name="descripcion" rows="3" 
                            required>@isset($producto) {{$producto->descripcion}} @endisset
                            </textarea>
                        </div>
                        <div class="mb-4">
                            <label for="img" class="form-label">
                                @isset($producto->img)
                                    Reemplazar imagen
                                @else
                                    Subir imagen
                                @endisset
                            </label>
                            <div class="d-flex align-items-center gap-2">
                                @isset($producto->img)
                                    <img src="{{ asset($producto->img) }}" alt="Imagen del producto" class="rounded" style="max-width: 37px;">
                                @endisset
                                <input type="file" class="form-control bg-white" id="img" name="img" accept="image/*">
                            </div>
                        </div>
                        <!-- botones -->
                        <div class="d-flex justify-content-between gap-3">
                            <button type="button" class="btn btn-light flex-fill border" 
                                onclick="window.location.href='{{ route('productos.index') }}'">Regresar</button>
                            <button type="button" class="btn btn-primary flex-fill" onclick="nextStep(1,2)">Siguiente</button>
                        </div>
                    </div>
                    <!-- paso no. 2 -->
                    <div id="paso_2" class="col" style="display:none;">
                        <!-- unidad de medida -->
                        <div class="mb-3">
                            <label for="unidad_medida" class="form-label">Unidad de medida</label>
                            <input type="number" class="form-control bg-white" id="unidad_medida" name="unidad_medida" 
                            @isset($producto) value="{{ $producto->unidad_medida }}" @endisset required>
                        </div>
                        <!-- precio -->
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio unitario del producto</label>
                            <input type="number" class="form-control bg-white" id="precio" name="precio"  
                            @isset($producto) value="{{ $producto->precio }}" @endisset required>
                        </div>
                        <!-- botones -->
                        <div class="d-flex justify-content-between gap-3">
                            <button type="button" class="btn btn-light flex-fill border" onclick="prevStep(2,1)">Regresar</button>
                            <button type="button" class="btn btn-primary flex-fill" onclick="nextStep(2,3)">Siguiente</button>
                        </div>
                    </div>
                    <!-- paso no. 3 -->
                    <div id="paso_3" class="col" style="display:none;">
                        <!-- cantidad total -->
                        <div class="mb-3">
                            <label for="cantidad_producto" class="form-label">Cantidad total de unidades</label>
                            <input type="text" class="form-control bg-white" id="cantidad_producto" name="cantidad_producto"  
                            @isset($producto) value="{{ $producto->cantidad_producto }}" @endisset required>
                        </div>
                        <!-- contenedor de ubicaciones -->
                        <div id="ubisContainer">
                            <!-- UBI -->
                            <div class="row mb-2 ubi-field">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <label for="almacen_id" class="form-label">Ubicacion</label>
                                    </div>
                                    <select class="form-select bg-white" id="almacen_id" name="almacen_id" required>
                                        <option selected disabled>Seleccione un almacen</option>
                                        @foreach ($almacenes as $almacen)
                                            <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="cantidad_producto" class="form-label">Cantidad almacenada</label>
                                    <input type="text" class="form-control bg-white" id="cantidad_producto" name="cantidad_producto" required>
                                </div>
                            </div>
                        </div>
                        <!-- add more ubis -->
                        <div class="mb-3">
                            <button type="button" class="text-primary fw-medium border-0 bg-transparent" onclick="addUbi()">
                                Agregar otra ubicacion +
                            </button>
                        </div>
                        <!-- botones -->
                        <div class="d-flex justify-content-between gap-3">
                            <button type="button" class="btn btn-light flex-fill border" onclick="prevStep(3,2)">Regresar</button>
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