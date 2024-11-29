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
                    <div class="fs-5 fw-semibold m-0">Gráfico de ventas</div>
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="graphics" id="esteMes" autocomplete="off" checked>
                            <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="esteMes">ESTE MES</label>

                            <input type="radio" class="btn-check" name="graphics" id="esteAno" autocomplete="off">
                            <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="esteAno">ESTE AÑO</label>

                            <input type="radio" class="btn-check" name="graphics" id="always" autocomplete="off">
                            <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="always">DESDE EL PRINCIPIO</label>
                    </div>
                </div>
                <div class="card-body">
                    <!-- mostrar grafica si ya hay para (TODO) -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <!-- almacenes & productos -->
    <div class="d-flex justify-content-center gap-3 w-100">
        <div class="col-4 p-0">
            <div class="card shadow-sm bg-white border-0 p-4">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Mis almacenes</div>
                    <div class="fs-5 flex-grow-1 text-end">
                        <a href="{{ route('almacenes.index') }}" class="fw-bold link-underline link-underline-opacity-0">Ver todos ></a>
                    </div>
                </div>

                <div class="d-flex mt-2 flex-column">
                    @foreach ($almacenes->take(3) as $almacen)
                        <button class="d-flex border-0 rounded bg-transparent px-0 py-2 gap-3 align-items-center justify-content-between">
                            <div class="d-flex">
                                <img src="{{ asset($almacen->img ?? 'storage/img/almacen.png') }}" alt="almacen"
                                class="rounded-2" style="width: 50px; height: 50px; object-fit: cover;">
                            </div>
                            <div class="d-flex flex-column w-100 align-items-start">
                                <div class="fw-bold">{{ $almacen->nombre }}</div>
                                <div class="d-flex aling-items-center">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    {{ $almacen->pais }}
                                </div>
                            </div>
                            <div class="d-flex w-100 gap-3 align-items-center pe-2">
                                <p class="fw-medium fs-5 m-0">25%</p>
                                <div class="progress w-100" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 25%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <svg width="18" height="18" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L8 8L1 15" stroke="#53545C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="card shadow-sm bg-white border-0 p-4 h-100">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Productos</div>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="productos" id="masVendidos" autocomplete="off" checked>
                        <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="masVendidos">MAS VENDIDOS</label>

                        <input type="radio" class="btn-check" name="productos" id="menosVendidos" autocomplete="off">
                        <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="menosVendidos">MENOS VENDIDOS</label>

                        <input type="radio" class="btn-check" name="productos" id="nivelBajoStock" autocomplete="off">
                        <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="nivelBajoStock">NIVEL BAJO DE STOCK</label>

                        <input type="radio" class="btn-check" name="productos" id="nivelAltoStock" autocomplete="off">
                        <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="nivelAltoStock">NIVEL ALTO DE STOCK</label>
                    </div>
                </div>

                <div id="productCarousel" class="carousel slide mt-4" data-bs-ride="carousel" style="background-color: white">

                    <div class="carousel-indicators">
                        @foreach ($productos->chunk(5) as $index => $chunk)
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $index }}" 
                                    class="{{ $index === 0 ? 'active' : '' }}" 
                                    aria-current="{{ $index === 0 ? 'true' : '' }}" 
                                    aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    
                
                    <div class="carousel-inner">
                        @foreach ($productos->chunk(6) as $index => $chunk)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row g-3">
                                    @foreach ($chunk as $producto)
                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="card bg-transparent">
                                                <img src="{{ asset($producto->img ?? 'storage/img/producto.jpeg') }}" 
                                                    class="card-img-top" 
                                                    alt="{{ $producto->nombre }}">
                                                <div class="card-body text-truncate py-0 text-center">
                                                    <h5 class="fs-6">{{ $producto->nombre }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                
                    <!-- Controles de navegación -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
