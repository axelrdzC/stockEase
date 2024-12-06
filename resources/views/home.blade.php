@extends('layouts.app')

@section('content')

<div class="col px-5">
    
    <!-- header de la seccion -->
    @section('titulo-seccion', 'Dashboard')
    @section('buscador', 'Busque algun producto, almacen, etc.')
    @include('components.tituloSeccion')

    <!-- grafica principal -->
    <div class="d-flex justify-content-center mb-3">
        <div class="col-md-8 w-100 p-0">
            <div class="card shadow-sm bg-white border-0 p-4">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Gráfico de productos almacenados</div>
                        <div class="btn-group" role="group">

                            <input type="radio" class="btn-check" name="graphics" id="esteAno" autocomplete="off" checked>
                            <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="esteAno">ESTE AÑO</label>

                            <input type="radio" class="btn-check" name="graphics" id="always" autocomplete="off">
                            <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="always">DESDE EL PRINCIPIO</label>
                    </div>
                </div>
                <div class="card-body p-0 mt-3">
                    <!-- mostrar grafica si ya hay para (TODO) -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="chart" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- almacenes & productos -->
    <div class="d-flex justify-content-center gap-3 w-100">

        <!-- almacenes -->
        @livewire('homeAlmacenes-component')
        <!-- productos -->
        @livewire('homeProductos-component')
        
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var chartContainer = document.querySelector("#chart");

        const dataAnual = @json($stockMensual); 
        const dataDesdeElPrincipio = @json($stockDesdeElPrincipio); 
        const categoriaDeAnios = @json($categoriaDeAnios);

        // Limpia cualquier gráfico anterior
        if (chartContainer.innerHTML) {
            chartContainer.innerHTML = "";
        }
        var options = {
            chart: {
                height: '100%',
                width: '100%', 
                stroke: {
                    curve: 'smooth',
                }
            },
            series: [{
                name: 'stock',
                data: dataAnual,
            }],
            xaxis: {
                categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
            }
        };
        var chart = new ApexCharts(chartContainer, options);
        chart.render();

        document.querySelectorAll('input[name="graphics"]').forEach((input) => {
            input.addEventListener('change', function () {
                if (chart) {
                    if (this.id === 'esteAno') {
                        chart.updateOptions({
                            series: [{
                                name: 'Stock',
                                data: dataAnual,
                            }],
                            xaxis: {
                                categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                            },
                        });
                    } else if (this.id === 'always') {
                        chart.updateOptions({
                            series: [{
                                name: 'Stock',
                                data: dataDesdeElPrincipio,
                            }],
                            xaxis: {
                                categories: categoriaDeAnios,
                            },
                        });
                    }
                }
            });
        });
    });
</script>
@endpush