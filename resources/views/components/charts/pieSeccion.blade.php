<div class="col gap-3 mb-4 w-100">
    <div class="fw-bold fs-4 mb-3">
        Administrar espacios
    </div>
    <div id="secciones-carousel" class="carousel slide">
        <div class="carousel-inner">
            @if (count($secciones) > 0)
                @foreach ($secciones as $index => $seccion)
                    <div class="border border-primary rounded p-4 carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div>
                            <div class="fw-bold fs-4">{{ $seccion->nombre }}</div>
                            <small class="fw-normal fs-6">Capacidad: {{ $seccion->capacidad }}</small>
                            <div class="d-flex w-50 gap-3 align-items-center pe-2">
                                <!-- Aquí agregamos el progreso dinámico -->
                                <p class="fw-medium fs-6 m-0">{{ number_format(($seccion->productos_actuales / $seccion->capacidad) * 100, 2) }}%</p>
                                <div class="progress w-100" role="progressbar">
                                    <div class="progress-bar" style="width: {{ ($seccion->productos_actuales / $seccion->capacidad) * 100 }}%"></div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div class="fw-normal fs-6">Últimos productos:</div>
                            </div>
                            <div><button class="btn btn-outline-primary">Ver más</button></div>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Item "Productos sin sección" -->
            <div id="productos-sin-seccion" class="border border-warning rounded p-4 carousel-item {{ count($secciones) === 0 ? 'active' : '' }}">
                <div>
                    <div class="fw-bold fs-4 ">Productos sin sección</div>
                    <small class="fw-normal fs-6">Productos aún no asignados.</small>
                    <hr>
                    <div id="lista-productos-sin-seccion" class="d-flex">
                        <!-- Productos se insertarán dinámicamente -->
                        
                        @if (count($noSeccionados) > 0)
                            @foreach ($noSeccionados->take(5) as $producto)
                            <div class="col-6 col-md-4 col-lg-2">
                                <button type="button" class="card bg-transparent pt-1 w-100 h-100" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $producto->nombre }}">
                                    <img src="{{ asset($producto->img ?? 'storage/img/producto.jpeg') }}" 
                                        class="card-img-top w-100" style="height: 9em; object-fit: cover;"
                                        alt="{{ $producto->nombre }}">
                                    <div class="card-body w-100 py-0 text-center">
                                        <small class="fs-6 m-1 text-truncate"> 
                                            {{ $producto->cantidad_producto . ' unidades' }}
                                        </small>
                                    </div>
                                </button>
                            </div>
                            @endforeach
                        @else
                            <p>No hay productos asignados todavía.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-next" type="button" data-bs-target="#secciones-carousel" data-bs-slide="next" aria-label="Next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>


<div id="chart"></div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const capacidadTotal = {{ $almacen->capacidad }};
        const data = @json($capacidad);
        const secciones = @json($nombreSeccion);
        const capacidadNoSeccionados = @json($capacidadNoSeccionados);

        const totalOcupado = data.reduce((sum, val) => sum + val, 0) + capacidadNoSeccionados;
        const espacioLibre = capacidadTotal - totalOcupado;

        const updatedSeries = [...data, capacidadNoSeccionados, espacioLibre];
        const updatedLabels = [...secciones, 'Productos sin sección', 'Espacio libre'];

        const options = {
            chart: {
                type: 'donut',
                height: 350,
                width: 500,
                events: {
                    dataPointSelection: (event, chartContext, config) => {
                        const selectedIndex = config.dataPointIndex;
                        // Llama a la función global
                        window.redirectToSlide(selectedIndex, updatedLabels, 'secciones-carousel');
                    }
                }
            },
            series: updatedSeries,
            labels: updatedLabels,
            colors: [...Array(secciones.length).fill('#8067B2'), '#FFC107', '#9C9C9D'],
            responsive: [{ breakpoint: 480, options: { chart: { width: 200 } } }]
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>

