@extends('layouts.app')

@section('title', 'Informes') 

@section('content')
 <div class="col px-5">
    <!-- header de la seccion -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="fs-2 fw-semibold">{{ __('Informe #5') }}</div>
        </div>
        <div class="col-md-4 p-0">
            <div class="d-flex gap-2">
                <div class="col p-0">
                <button type="button" onclick="window.location.href='{{ route('informes.export') }}'" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.3594 13.6209C24.1031 13.3759 25.4456 11.8809 25.4494 10.0697C25.4494 8.28466 24.1481 6.80466 22.4419 6.52466" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.6611 17.8129C26.3499 18.0654 27.5286 18.6566 27.5286 19.8754C27.5286 20.7141 26.9736 21.2591 26.0761 21.6016" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8589 18.3297C10.8414 18.3297 7.41016 18.9385 7.41016 21.3697C7.41016 23.7997 10.8202 24.426 14.8589 24.426C18.8764 24.426 22.3064 23.8235 22.3064 21.391C22.3064 18.9585 18.8977 18.3297 14.8589 18.3297Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8587 14.8599C17.495 14.8599 19.6325 12.7236 19.6325 10.0861C19.6325 7.44988 17.495 5.31238 14.8587 5.31238C12.2225 5.31238 10.085 7.44988 10.085 10.0861C10.075 12.7136 12.1962 14.8511 14.8237 14.8599H14.8587Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.3566 13.6209C5.6116 13.3759 4.27035 11.8809 4.2666 10.0697C4.2666 8.28466 5.56785 6.80466 7.2741 6.52466" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.055 17.8129C3.36625 18.0654 2.1875 18.6566 2.1875 19.8754C2.1875 20.7141 2.7425 21.2591 3.64 21.6016" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="text-wrap lh-1 text-start text-body-secondary">
                            Generar PDF
                        </div>
                    </button>
                </div>
                <div class="col p-0">
                    <button type="button" onclick="" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.3594 13.6209C24.1031 13.3759 25.4456 11.8809 25.4494 10.0697C25.4494 8.28466 24.1481 6.80466 22.4419 6.52466" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.6611 17.8129C26.3499 18.0654 27.5286 18.6566 27.5286 19.8754C27.5286 20.7141 26.9736 21.2591 26.0761 21.6016" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8589 18.3297C10.8414 18.3297 7.41016 18.9385 7.41016 21.3697C7.41016 23.7997 10.8202 24.426 14.8589 24.426C18.8764 24.426 22.3064 23.8235 22.3064 21.391C22.3064 18.9585 18.8977 18.3297 14.8589 18.3297Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8587 14.8599C17.495 14.8599 19.6325 12.7236 19.6325 10.0861C19.6325 7.44988 17.495 5.31238 14.8587 5.31238C12.2225 5.31238 10.085 7.44988 10.085 10.0861C10.075 12.7136 12.1962 14.8511 14.8237 14.8599H14.8587Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.3566 13.6209C5.6116 13.3759 4.27035 11.8809 4.2666 10.0697C4.2666 8.28466 5.56785 6.80466 7.2741 6.52466" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.055 17.8129C3.36625 18.0654 2.1875 18.6566 2.1875 19.8754C2.1875 20.7141 2.7425 21.2591 3.64 21.6016" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="text-wrap lh-1 text-start text-body-secondary">
                        Generar CSV
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- contenedor Proveedores -->
    <div class="d-flex gap-4">
        <!-- filtros -->
        <div class="d-flex h-100" style="width: 18rem;">
            <div class="card border-0 bg-white shadow-sm w-100">
                <div class="card-body">
                    <h5 class="card-title">Filtros</h5>
                    <!-- filtro orden abc -->
                    <div class="mb-3">
                        <small for="filterCategory" class="form-label">ORDENAR POR</small>
                        <select id="filterCategory" class="form-select selects">
                            <option selected>Seleccionar</option>
                            <option value="1">ALFABETICO: A-Z</option>
                            <option value="2">ALFABETICO: Z-A</option>
                        </select>
                    </div>
                    <!-- filtro por tipo -->
                    <div class="mb-3">
                        <small for="filterCategory" class="form-label">TIPO</small>
                        <select id="filterCategory" class="form-select selects">
                            <option selected>Seleccionar</option>
                            <option value="1">TODOS</option>
                            <option value="2">VINILOS</option>
                            <option value="2">GALLETAS</option>
                            <option value="2">ROPA</option> 
                        </select>
                    </div>
                    <!-- boton reset filtros -->
                    <button type="button" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm mt-2">
                        Regenerar
                    </button>
                </div>
            </div>
        </div>
        <!-- tabla d proveedores -->
        <div class="container p-0 flex-grow-1">
            <div class="col">
                
                    <div class="card shadow-sm bg-white border-0 m-0 mb-3">
                        <div class="card-body d-flex align-items-center gap-4 px-4">
                            <div class="col-1 p-0">
                                <img src="img/cliente.png" alt="" class="w-100 rounded-circle">
                            </div>
                            <div class="d-flex flex-column" style="width: 18rem;">
                                <div class="d-flex flex-column">
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>

</div>    

<script>
    function ifPersonalizada(valor) {
    const fechasPersonalizadas = document.getElementById('fechas_personalizadas');
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
