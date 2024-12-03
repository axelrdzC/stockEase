<div id="chart"></div>
<div class="fw-bold fs-4 mb-4 w-100">
    Administrar espacios
    <div class="fs-6 mt-3 fw-normal bg-primary-subtle rounded p-3">
        Capacidad total del almacen:
    </div>
    <div id="info" class="fs-6 mt-3 fw-normal">
        Seleccione alguna seccion para empezar a administrarla
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        var options = {
            chart: {
                type: 'donut',
                events: {
                    dataPointSelection: function(event, chartContext, config) {

                        // slice activo
                        var selectedIndex = config.dataPointIndex;

                        // get datos
                        var selectedValue = options.series[selectedIndex];
                        var selectedCategory = options.labels[selectedIndex];

                        // get porcentaje
                        var total = options.series.reduce((sum, val) => sum + val, 0);
                        var percentage = ((selectedValue / total) * 100).toFixed(2);

                        // actualizar container
                        var infoDiv = document.getElementById('info');
                        infoDiv.innerHTML = `
                            Nombre: ${selectedCategory} <br> 
                            Cantidad de productos almacenados: ${selectedValue} (${percentage}%)
                        `;
                    }
                },
                fontFamily: 'Rubik, sans-serif',
                height: 350,
                width: 500,
            },
            series: @json($data),
            labels: @json($categories),
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
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
