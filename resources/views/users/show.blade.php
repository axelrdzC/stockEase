@extends('layouts.app')

@section('title')
Show User
@endsection

@section('content')
<div class="col px-5">
    <!-- header de la seccion -->
    <div class="row align-items-center pb-3">
        <div class="col-sm-3 col-lg-5">
            <div class="fs-2 fw-semibold">Hola <span class="user-name">{{ Auth::user()->name }}</span> 👋</div>
        </div>
        <div class="col-6 ms-auto">
            <div class="d-flex align-items-center">
                <div class="input-group me-3">
                </div>
                <button type="button" onclick="" class="btn btn-primary text-nowrap p-2 px-4 fw-medium">
                    <svg width="24" height="24" class="nav-icon me-2" fill="none">
                        <path d="M11.9561 17.0358H17.9999" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.15 3.16233C11.7964 2.38982 12.9583 2.27655 13.7469 2.90978C13.7905 2.94413 15.1912 4.03232 15.1912 4.03232C16.0575 4.55599 16.3266 5.66925 15.7912 6.51882C15.7627 6.56432 7.84329 16.4704 7.84329 16.4704C7.57981 16.7991 7.17986 16.9931 6.75242 16.9978L3.71961 17.0358L3.03628 14.1436C2.94055 13.7369 3.03628 13.3098 3.29975 12.9811L11.15 3.16233Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.68359 5.00073L14.2271 8.49" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>    
                    </svg>
                    Editar perfil
                </button>
            </div>
        </div>
    </div>

    <!-- tarjeta de informacion sobre el user -->
    <div class="bg-light rounded">
        <div class="card bg-white">
            <div class="card-body d-flex p-4">
                <!-- left side: foto y nombres -->
                <div class="d-flex align-items-center pe-4 w-75" style="border-right: 1px solid #dee2e6;">
                    <div class="text-center me-4">
                        <img src="{{ asset('img/default-avatar.jpg') }}" alt="User Photo" class="rounded-circle" style="width: 120px; height: 120px;">
                    </div>
                    <div class="row ms-0">
                        <h2 class="fs-1 fw-bold m-0 p-0">{{ $user->name }}</h2>
                        <small class="text-muted p-0">{{ $user->name }}</small>
                        <div class="card text-center bg-primary-subtle p-0" style="width: 8rem;">
                            <div class="card-body p-0">
                                ese {{ $user->rol }}
                            </div>
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
                        {{ $user->username }}
                    </div>
                    <div>
                        <svg width="24" height="24" class="nav-icon me-2" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        
                    </div>
                </div>
            </div>
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
@endsection