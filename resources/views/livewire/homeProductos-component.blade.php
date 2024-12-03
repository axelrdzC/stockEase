<!-- productos -->
<div class="col p-0">
    <div class="card shadow-sm bg-white border-0 p-4 h-100">

        <div class="d-flex align-items-center gap-4">
            <div class="fs-5 fw-semibold m-0">Productos</div>
            <div class="btn-group" role="group">
                <input type="radio" class="btn-check" id="masVendidos" value="mas_vendidos" wire:model.live="productoFiltro">
                <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="masVendidos">MAS VENDIDOS</label>
        
                <input type="radio" class="btn-check" id="menosVendidos" value="menos_vendidos" wire:model.live="productoFiltro">
                <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="menosVendidos">MENOS VENDIDOS</label>
        
                <input type="radio" class="btn-check" id="nivelBajoStock" value="nivel_bajo_stock" wire:model.live="productoFiltro">
                <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="nivelBajoStock">NIVEL BAJO DE STOCK</label>

                <input type="radio" class="btn-check" id="nivelAltoStock" value="nivel_alto_stock" wire:model.live="productoFiltro">
                <label class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" for="nivelAltoStock">NIVEL ALTO DE STOCK</label>

            </div>
        </div>          

        <div id="productCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        
            <div class="carousel-inner">
                @php
                    $cont = 1;
                @endphp
                @foreach ($productos->chunk(5) as $index => $chunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row g-3">
                            @foreach ($chunk as $producto)
                                <div class="col-6 col-md-4 col-lg-2">
                                    <button type="button" class="card bg-transparent pt-1 w-100 h-100" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $producto->nombre }}">
                                        <img src="{{ asset($producto->img ?? 'storage/img/producto.jpeg') }}" 
                                            class="card-img-top w-100" style="height: 9em; object-fit: cover;"
                                            alt="{{ $producto->nombre }}">
                                        <div class="card-body w-100 py-0 text-center">
                                            <small class="fs-6 m-1 text-truncate"> 
                                                <span class=" position-absolute posicion start-100 translate-middle badge rounded-pill text-bg-warning"> {{ $cont }} </span> 
                                                {{ $producto->cantidad_producto . ' unidades' }}
                                            </small>
                                        </div>
                                    </button>
                                </div>
                                @php
                                    $cont++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        
            <!-- nav (>) -->
            <button class="carousel-control-next my-5" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
        
    </div>
</div>