@extends('layouts.app')

@section('title', 'Informes') 

@section('content')
 <div class="col px-5">
    
    <!-- header de la seccion -->
    @section('titulo-seccion', 'Informes')
    @section('buscador', 'Escriba el nombre de un informe aqui')
    @include('components.tituloSeccion')

    <!-- tema del informe (productos, inventario, etc.) -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" 
            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Productos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" 
            type="button" role="tab" aria-controls="pills-profile" aria-selected="false" disabled>Ventas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" 
            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Inventario</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-ordenes-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" 
            type="button" role="tab" aria-controls="pills-ordenes" aria-selected="false" disabled>Ordenes</button>
        </li>
    </ul>

    <!-- contenedor de forms -->
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <!-- tarjeta con el form -->
            <div class="row pb-5">                
                <!-- tarjeta de informacion sobre el user -->
                <div class="col">
                    <div class="card bg-white rounded shadow-sm border-0">
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="pb-3">Generar informe</h5>
                            <form method="POST" action="{{ route('informes.store') }}"> 
                                @csrf    
                                <!-- metrica -->
                                <div class="mb-3">
                                    <div class="d-flex">                            
                                        <label for="tipo_informe" class="form-label">Metrica</label>
                                    </div>
                                    <select class="form-select bg-white" id="tipo_informe" name="tipo_informe" required>
                                        <option selected disabled>Selecciona una metrica</option>
                                        <option value="stock">Cantidad en stock</option>
                                        <option value="baja_rotacion" disabled>Productos menos vendidos (no sirve)</option>
                                        <option value="baja_rotacion" disabled>Productos mas vendidos (no sirve)</option>
                                        <option value="baja_rotacion" disabled>Productos sin movimiento (no sirve)</option>
                                        <option value="baja_rotacion" disabled>Productos con caducidad proxima (no sirve)</option>
                                    </select>
                                </div>     
                                <!-- Rango de Fechas -->
                                <div class="mb-3">
                                    <label for="fecha_predefinida" class="form-label">Fecha</label>
                                    <select id="fecha_predefinida" class="form-select bg-white" onchange="ifPersonalizada(this.value)">
                                        <option selected disabled>Selecciona un rango</option>
                                        <option value="hoy">Hoy</option>
                                        <option value="semana_actual" disabled>Esta Semana</option>
                                        <option value="mes_actual" disabled>Este Mes</option>
                                        <option value="personalizado">Personalizado</option>
                                    </select>
                                </div>
                                <!-- fechas definidas -->
                                <div class="row mb-3 d-none" id="fechas_personalizadas">
                                    <div class="col-6">
                                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control bg-white">
                                    </div>
                                    <div class="col-6">
                                        <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control bg-white">
                                    </div>
                                </div>
                                <!-- nombre -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre del informe (opcional)</label>
                                    <input type="text" class="form-control bg-white" id="nombre" name="nombre" placeholder="Escribe un nombre para el informe">
                                </div>
                                <!-- desc -->
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion (opcional)</label>
                                    <textarea class="form-control bg-white" id="descripcion" name="descripcion" rows="3"></textarea>
                                </div>
                                <button type="submit" class="mt-2 btn btn-primary flex-fill">Generar reporte</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <!-- tarjeta con el form -->
            <div class="row pb-5">                
                <!-- tarjeta de informacion sobre el user -->
                <div class="col">
                    <div class="card bg-white rounded shadow-sm border-0">
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="pb-3">Generar informe</h5>
                            <form method="POST" action="{{ route('informes.store') }}"> 
                                @csrf    
                                <!-- metrica -->
                                <div class="mb-3">
                                    <div class="d-flex">                            
                                        <label for="tipo_informe" class="form-label">Metrica</label>
                                    </div>
                                    <select class="form-select bg-white" id="tipo_informe" name="tipo_informe" onchange="ifIndex(this.value)" required>
                                        <option selected disabled>Selecciona una metrica</option>
                                        <option value="index">Index de productos en un almacen</option>
                                    </select>
                                </div>   
                                <!-- elegir almacen -->
                                <div class="mb-3 d-none" id="index_almacen">         
                                    <select class="form-select bg-white" id="almacen" name="almacen" required>
                                        <option selected disabled>Seleccione un almacen</option>
                                        @foreach ($almacenes as $almacen)
                                            <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- nombre -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre del informe (opcional)</label>
                                    <input type="text" class="form-control bg-white" id="nombre" name="nombre" placeholder="Escribe un nombre para el informe">
                                </div>
                                <!-- desc -->
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion (opcional)</label>
                                    <textarea class="form-control bg-white" id="descripcion" name="descripcion" rows="3"></textarea>
                                </div>
                                <button type="submit" class="mt-2 btn btn-primary flex-fill">Generar reporte</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-ordenes" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
    </div>

</div>    

<script>

    function ifIndex(valor) {
        const almacenes = document.getElementById('index_almacen');

        if (valor === "index") {
            almacenes.classList.remove('d-none');
        } else {
            almacenes.classList.add('d-none');
        }
    }

    function ifPersonalizada(valor) {
        const almacenes = document.getElementById('fechas_personalizadas');
        const inicio = document.getElementById('fecha_inicio');
        const fin = document.getElementById('fecha_fin');

        if (valor === "personalizado") {
            fechasPersonalizadas.classList.remove('d-none');
            inicio.required = true;
            fin.required = true;
        } else {
            fechasPersonalizadas.classList.add('d-none');
            inicio.required = false;
            fin.required = false;
            setFechas(valor);
        }
    }

</script>

@endsection
