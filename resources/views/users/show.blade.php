@extends('layouts.app')

@section('title')
    {{ $user->name }} (me)
@endsection

@section('content')
<div class="col px-5">
    <!-- header de la seccion -->
    <div class="row align-items-center pb-3">
        <div class="col">
            <div class="fs-2 fw-semibold">Mi perfil</div>
        </div>
        <div class="col-2">
            <div class="d-flex align-items-center">
                <a class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 link-underline link-underline-opacity-0 shadow-sm"
                data-bs-toggle="modal" data-bs-target="#editUser">
                    <svg width="24" height="24" class="nav-icon me-2" fill="none">
                        <path d="M11.9561 17.0358H17.9999" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.15 3.16233C11.7964 2.38982 12.9583 2.27655 13.7469 2.90978C13.7905 2.94413 15.1912 4.03232 15.1912 4.03232C16.0575 4.55599 16.3266 5.66925 15.7912 6.51882C15.7627 6.56432 7.84329 16.4704 7.84329 16.4704C7.57981 16.7991 7.17986 16.9931 6.75242 16.9978L3.71961 17.0358L3.03628 14.1436C2.94055 13.7369 3.03628 13.3098 3.29975 12.9811L11.15 3.16233Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.68359 5.00073L14.2271 8.49" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>    
                    </svg>
                    Editar perfil
                </a>
            </div>
        </div>

    </div>

    <!-- tarjeta d info y botones -->
    <div class="row pb-5">
        
        <!-- tarjeta de informacion sobre el user -->
        <div class="col-md-10 bg-white rounded shadow-sm">
            <div class="card bg-white border-0">
                <div class="card-body d-flex p-4">
                    <!-- left side: foto y nombres -->
                    <div class="d-flex align-items-center pe-4" style="border-right: 1px solid #dee2e6; width: 45rem;">
                        <div class="text-center me-4">
                            <img src="{{ asset(Auth::user()->img ?? 'storage/img/persona-default.jpg') }}" alt="User Photo" class="rounded-circle" style="width: 120px; height: 120px;">
                        </div>
                        <div class="row ms-0">
                            <h2 class="fs-1 fw-bold m-0 p-0">{{ $user->name }}</h2>
                            <small class="text-muted p-0 pb-2">{{ $user->name_completo }}</small>
                            <div class="card text-center fw-medium bg-primary-subtle p-1 px-3 w-auto">
                                @php
                                    $roles = [
                                        'super-admin' => 'SUPER ADMIN',
                                        'admin' => 'ADMIN',
                                        'empleado' => 'EMPLEADO'
                                    ];
                                @endphp
                                @foreach ($roles as $role => $label)
                                    @role($role)
                                        {{ $label }}
                                    @endrole
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- right side: info importante -->
                    <div class="ms-4 row d-flex justify-content-center align-items-center gap-0">
                        <div>
                            <svg width="24" height="24" class="nav-icon me-2" fill="none">
                                <path d="M17.9028 9.3512L13.4596 12.9642C12.6201 13.6302 11.4389 13.6302 10.5994 12.9642L6.11865 9.3512" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21.5C19.9502 21.5084 22 19.0095 22 15.9384V9.07001C22 5.99883 19.9502 3.5 16.9089 3.5H7.09114C4.04979 3.5 2 5.99883 2 9.07001V15.9384C2 19.0095 4.04979 21.5084 7.09114 21.5H16.9089Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{ $user->email }}
                        </div>
                        <div>
                            <svg width="24" height="24" class="nav-icon me-2" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{ $user->direccion }}
                        </div>
                        <div>
                            <svg width="24" height="24" class="nav-icon me-2" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{ $user->telefono }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2 d-flex flex-column gap-2">
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
                    Gestionar usuarios
                </div>
            </button>
            <button type="button" onclick="" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4175 3.43762H9.58125C5.805 3.43762 3.4375 6.11137 3.4375 9.89512V20.1051C3.4375 23.8889 5.79375 26.5626 9.58125 26.5626H20.4163C24.205 26.5626 26.5625 23.8889 26.5625 20.1051V9.89512C26.5625 6.11137 24.205 3.43762 20.4175 3.43762Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3614 15.0002C13.3614 16.2789 12.3252 17.3152 11.0464 17.3152C9.7677 17.3152 8.73145 16.2789 8.73145 15.0002C8.73145 13.7214 9.7677 12.6852 11.0464 12.6852H11.0502C12.3264 12.6864 13.3614 13.7227 13.3614 15.0002Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3652 15.0001H21.2627V17.3151" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.7275 17.3152V15.0002" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="text-wrap lh-1 text-start text-body-secondary">
                    Gestionar permisos
                </div>
            </button>
        </div>
    
    </div>

    <!-- actividad -->
    <div class="bg-transparent border border-0 mt-4 p-0">
        <div class="card bg-transparent border border-0 p-0">
            <div class="card-body p-0">
                <h5 class="card-title">Actividad</h5>
                <hr class="my-3 border-bottom">
                <div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- el modal aka formulario add categoria -->
@include('components.modales.editUser')
@endsection