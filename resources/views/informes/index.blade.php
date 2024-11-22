@extends('layouts.app')

@section('title', 'Informes') 

@section('content')
 <div class="col px-5">
    <!-- header de la seccion -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="fs-2 fw-semibold">{{ __('Informes') }}</div>
        </div>
        <!-- buscador -->
        <div class="col-md-4 p-0">
            <div class="d-flex p-0 gap-2">
                <form class="d-flex position-relative w-100" role="search">
                    <input class="form-control border-secondary px-4 p-2 bg-white border-0 shadow-sm" 
                        type="search" placeholder="Buscar informe" aria-label="Search">
                    <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent me-2" type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.0183 18.4851L21.5423 22" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!--
    <div class="d-flex gap-2 pb-3">
        
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
                    Productos
                </div>
            </button>
        </div>
        <div class="col p-0">
            <button type="button" onclick="" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4175 3.43762H9.58125C5.805 3.43762 3.4375 6.11137 3.4375 9.89512V20.1051C3.4375 23.8889 5.79375 26.5626 9.58125 26.5626H20.4163C24.205 26.5626 26.5625 23.8889 26.5625 20.1051V9.89512C26.5625 6.11137 24.205 3.43762 20.4175 3.43762Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3614 15.0002C13.3614 16.2789 12.3252 17.3152 11.0464 17.3152C9.7677 17.3152 8.73145 16.2789 8.73145 15.0002C8.73145 13.7214 9.7677 12.6852 11.0464 12.6852H11.0502C12.3264 12.6864 13.3614 13.7227 13.3614 15.0002Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3652 15.0001H21.2627V17.3151" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.7275 17.3152V15.0002" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="text-wrap lh-1 text-start text-body-secondary">
                    Ventas
                </div>
            </button>
        </div>
        <div class="col p-0">
            <button type="button" onclick="" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4175 3.43762H9.58125C5.805 3.43762 3.4375 6.11137 3.4375 9.89512V20.1051C3.4375 23.8889 5.79375 26.5626 9.58125 26.5626H20.4163C24.205 26.5626 26.5625 23.8889 26.5625 20.1051V9.89512C26.5625 6.11137 24.205 3.43762 20.4175 3.43762Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3614 15.0002C13.3614 16.2789 12.3252 17.3152 11.0464 17.3152C9.7677 17.3152 8.73145 16.2789 8.73145 15.0002C8.73145 13.7214 9.7677 12.6852 11.0464 12.6852H11.0502C12.3264 12.6864 13.3614 13.7227 13.3614 15.0002Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3652 15.0001H21.2627V17.3151" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.7275 17.3152V15.0002" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="text-wrap lh-1 text-start text-body-secondary">
                    Inventario
                </div>
            </button>
        </div>
        <div class="col p-0">
            <button type="button" onclick="" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4175 3.43762H9.58125C5.805 3.43762 3.4375 6.11137 3.4375 9.89512V20.1051C3.4375 23.8889 5.79375 26.5626 9.58125 26.5626H20.4163C24.205 26.5626 26.5625 23.8889 26.5625 20.1051V9.89512C26.5625 6.11137 24.205 3.43762 20.4175 3.43762Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3614 15.0002C13.3614 16.2789 12.3252 17.3152 11.0464 17.3152C9.7677 17.3152 8.73145 16.2789 8.73145 15.0002C8.73145 13.7214 9.7677 12.6852 11.0464 12.6852H11.0502C12.3264 12.6864 13.3614 13.7227 13.3614 15.0002Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3652 15.0001H21.2627V17.3151" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.7275 17.3152V15.0002" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="text-wrap lh-1 text-start text-body-secondary">
                    Ordenes
                </div>
            </button>
        </div>
        <div class="col p-0">
            <button type="button" onclick="" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4175 3.43762H9.58125C5.805 3.43762 3.4375 6.11137 3.4375 9.89512V20.1051C3.4375 23.8889 5.79375 26.5626 9.58125 26.5626H20.4163C24.205 26.5626 26.5625 23.8889 26.5625 20.1051V9.89512C26.5625 6.11137 24.205 3.43762 20.4175 3.43762Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3614 15.0002C13.3614 16.2789 12.3252 17.3152 11.0464 17.3152C9.7677 17.3152 8.73145 16.2789 8.73145 15.0002C8.73145 13.7214 9.7677 12.6852 11.0464 12.6852H11.0502C12.3264 12.6864 13.3614 13.7227 13.3614 15.0002Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3652 15.0001H21.2627V17.3151" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.7275 17.3152V15.0002" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="text-wrap lh-1 text-start text-body-secondary">
                    Proveedores
                </div>
            </button>
        </div>
        <div class="col p-0">
            <button type="button" onclick="" class="shadow-sm flex-grow-1 btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4175 3.43762H9.58125C5.805 3.43762 3.4375 6.11137 3.4375 9.89512V20.1051C3.4375 23.8889 5.79375 26.5626 9.58125 26.5626H20.4163C24.205 26.5626 26.5625 23.8889 26.5625 20.1051V9.89512C26.5625 6.11137 24.205 3.43762 20.4175 3.43762Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3614 15.0002C13.3614 16.2789 12.3252 17.3152 11.0464 17.3152C9.7677 17.3152 8.73145 16.2789 8.73145 15.0002C8.73145 13.7214 9.7677 12.6852 11.0464 12.6852H11.0502C12.3264 12.6864 13.3614 13.7227 13.3614 15.0002Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3652 15.0001H21.2627V17.3151" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.7275 17.3152V15.0002" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="text-wrap lh-1 text-start">
                    Personalizado
                </div>
            </button>
        </div>
    </div>-->

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" 
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">Productos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" 
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ventas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" 
                type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Inventario</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-ordenes-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" 
                type="button" role="tab" aria-controls="pills-ordenes" aria-selected="false">Ordenes</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <!-- tarjeta con el form -->
                <div class="row pb-5">                
                    <!-- tarjeta de informacion sobre el user -->
                    <div class="col">
                        <div class="card bg-white rounded shadow-sm border-0">
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="pb-3">Generar informe</h5>
                                <form action="" class="">     
                                    <!-- metrica -->
                                    <div class="mb-3">
                                        <div class="d-flex">                            
                                            <label for="metrica" class="form-label">Metrica</label>
                                        </div>
                                        <select class="form-select bg-white" id="metrica" name="pmetricaroveedor_id" required>
                                            <option selected disabled>Selecciona una metrica</option>
                                            <option value="stock">Cantidad en stock</option>
                                            <option value="baja_rotacion">Productos menos vendidos</option>
                                            <option value="baja_rotacion">Productos mas vendidos</option>
                                            <option value="baja_rotacion">Productos sin movimiento</option>
                                            <option value="baja_rotacion">Productos con caducidad proxima</option>
                                        </select>
                                    </div>     
                                    <!-- Rango de Fechas -->
                                    <div class="mb-3">
                                        <label for="fecha_predefinida" class="form-label">Fecha</label>
                                        <select id="fecha_predefinida" class="form-select bg-white" onchange="ifPersonalizada(this.value)">
                                            <option selected disabled>Selecciona un rango</option>
                                            <option value="hoy">Hoy</option>
                                            <option value="semana_actual">Esta Semana</option>
                                            <option value="mes_actual">Este Mes</option>
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
                                        <label for="descripcion" class="form-label">Nombre del informe (opcional)</label>
                                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" placeholder="Escribe un nombre para el informe">
                                    </div>
                                    <button type="submit" class="mt-2 btn btn-primary flex-fill">Generar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="pills-ordenes" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
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
