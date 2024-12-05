<div class="d-flex flex-column gap-3 fw-bold fs-4 mb-4 w-100">
    Administrar espacios
    <div id="secciones-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($secciones as $index => $seccion)
            <div class="border border-primary rounded p-4 carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div>
                    <div>{{ $seccion->nombre }}</div>
                    <small class="fw-normal fs-6">Capacidad: {{ $seccion->capacidad }}</small>
                    <div class="d-flex w-50 gap-3 align-items-center pe-2">
                        <p class="fw-medium fs-6 m-0">25%</p>
                        <div class="progress w-100" role="progressbar">
                            <div class="progress-bar" style="width: 25%"></div>
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
            <!-- Espacio para "Productos sin sección" -->
            <div id="productos-sin-seccion" class="border border-warning rounded p-4 carousel-item">
                <div>
                    <div>Productos sin sección</div>
                    <small class="fw-normal fs-6">Productos aún no asignados.</small>
                    <hr>
                    <div id="lista-productos-sin-seccion">
                        <!-- Los productos se insertarán dinámicamente -->
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#secciones-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#secciones-carousel" data-bs-slide="next">
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

        const carousel = document.getElementById('secciones-carousel');

        const options = {
            chart: {
                type: 'donut',
                height: 350,
                width: 500,
                events: {
                    dataPointSelection: (event, chartContext, config) => {
                        const selectedIndex = config.dataPointIndex;
                        const selectedCategory = updatedLabels[selectedIndex];

                        if (selectedCategory === 'Productos sin sección') {
                            // Ir al slide de "Productos sin sección"
                            new bootstrap.Carousel(carousel).to(secciones.length);
                            renderProductosSinSeccion();
                        } else if (selectedCategory === 'Espacio libre') {
                            alert('El espacio libre no está asociado a ninguna sección.');
                        } else {
                            // Ir al slide correspondiente a la sección
                            new bootstrap.Carousel(carousel).to(selectedIndex);
                        }
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

        function renderProductosSinSeccion() {
            const productosContainer = document.getElementById('lista-productos-sin-seccion');
            productosContainer.innerHTML = '';
        }
    });
</script>
