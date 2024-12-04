
<div class="d-flex flex-column gap-3 fw-bold fs-4 mb-4 w-100">
    Administrar espacios
    <div id="almacen-info" class="fs-6 mt-3 fw-normal bg-primary-subtle border border-primary rounded p-3">
        Capacidad total del almacén: <span class="fw-medium">{{ $almacen->capacidad }}</span>
        (<span id="almacen-ocupado">0%</span> ocupado)
    </div>
    <div id="secciones-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach ($secciones as $index => $seccion)
            <div class="border border-primary rounded p-4 carousel-item {{ $index === 0 ? 'active' : '' }}">
                
                <div>
                    <div>
                        {{ $seccion->nombre }}
                    </div>
                    <small class="fw-normal fs-6">
                        Capacidad: {{ $seccion->capacidad }}
                    </small>
                    <hr></hr>
                    <div>
                        <div class="fw-normal fs-6">
                            Ultimos productos:
                        </div>
                    </div>
                </div>
                
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#secciones-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#secciones-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>      
    <div id="info" class="fs-6 mt-3 fw-normal">
        Seleccione alguna seccion para empezar a administrarla
    </div>
</div>
<div id="chart"></div>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        function highlightSlice(index) {

            chart.updateOptions({
                chart: {
                    events: {
                        dataPointSelection: function (event, chartContext, config) {
                            chartContext.toggleDataPointSelection(config.dataPointIndex);
                        }
                    }
                }
            });

            chart.toggleDataPointSelection(index);

            var selectedValue = data[index];
            var selectedCategory = categories[index];

            var infoDiv = document.getElementById('info');
            var slicePercentage = ((selectedValue / capacidadTotal) * 100).toFixed(2);
            if (selectedCategory === 'Espacio libre') {
                infoDiv.innerHTML = `El espacio no está siendo utilizado. <br> Capacidad disponible: ${slicePercentage}% de la capacidad total.`;
            } else {
                infoDiv.innerHTML = `Nombre: ${selectedCategory} <br> Espacio ocupado: ${selectedValue}`;
            }
        }


        // important data o sea los datos, la capacidad totoal y las secciones
        var capacidadTotal = {{ $almacen->capacidad }};
        var data = @json($data); 
        var secciones = @json($categories);

        var totalOcupado = data.reduce((sum, val) => sum + val, 0);

        var espacioLibre = capacidadTotal - totalOcupado;

        var updatedSeries = [...data, espacioLibre];
        var updatedLabels = [...secciones, 'Espacio libre'];

        var porcentajeOcupado = ((totalOcupado / capacidadTotal) * 100).toFixed(2);

        var almacenOcupadoSpan = document.getElementById('almacen-ocupado');
        almacenOcupadoSpan.textContent = `${porcentajeOcupado}%`;

        var options = {
            chart: {
                type: 'donut',
                events: {
                    dataPointSelection: function (event, chartContext, config) {
                        // Índice del slice seleccionado
                        var selectedIndex = config.dataPointIndex;

                        // Obtener datos
                        var selectedValue = updatedSeries[selectedIndex];
                        var selectedCategory = updatedLabels[selectedIndex];

                        // Calcular porcentaje del slice
                        var slicePercentage = ((selectedValue / capacidadTotal) * 100).toFixed(2);

                        // Actualizar información del slice
                        var infoDiv = document.getElementById('info');
                        if (selectedCategory === 'Espacio libre') {
                            // Mostrar mensaje para espacio no ocupado
                            infoDiv.innerHTML = `
                                El espacio no está siendo utilizado. <br> 
                                Capacidad disponible: ${slicePercentage}% de la capacidad total.
                            `;
                        } else {
                            // Mostrar mensaje para slices ocupados
                            infoDiv.innerHTML = `
                                Nombre: ${selectedCategory} <br> 
                                Espacio ocupado: ${selectedValue}
                            `;
                        }
                    }
                },
                fontFamily: 'Rubik, sans-serif',
                height: 350,
                width: 500,
            },
            series: updatedSeries,
            labels: updatedLabels,
            colors: [
                ...Array(secciones.length).fill('#8067B2'),
                '#9C9C9D' // Color gris para espacio no ocupado
            ],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'left'
                    }
                }
            }],
            states: {
                active: {
                    filter: {
                        type: 'none'
                    },
                    style: {
                        borderColor: '#ff0000',
                        borderWidth: 4
                    }
                }
            },
            theme: {
                mode: 'light',
                palette: 'palette10',
                monochrome: {
                    enabled: false,
                    color: '#255aee',
                    shadeTo: 'light',
                    shadeIntensity: 0.65
                },
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
