    <!-- almacenes -->
    <div class="col-4 p-0">
            <div class="card shadow-sm bg-white border-0 p-4 h-100">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Mis almacenes</div>
                    <div class="fs-5 flex-grow-1 text-end">
                        <a href="{{ route('almacenes.index') }}" class="fw-bold link-underline link-underline-opacity-0">Ver todos ></a>
                    </div>
                </div>

                <div class="d-flex mt-2 flex-column">
                    @foreach ($almacenes->sortByDesc('created_at')->take(3) as $almacen)
                    <button class="d-flex border-0 rounded bg-transparent px-0 py-2 gap-3 align-items-center justify-content-between">
                        <div class="d-flex">
                            <img src="{{ asset($almacen->img ?? 'storage/img/almacen.png') }}" alt="almacen"
                            class="rounded-2" style="width: 50px; height: 50px; object-fit: cover;">
                        </div>
                        <div class="d-flex flex-column w-100 align-items-start">
                            <div class="fw-bold">{{ $almacen->nombre }}</div>
                            <div class="d-flex align-items-center">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                {{ $almacen->ubicacion }}
                            </div>
                        </div>
                        <div class="d-flex w-100 gap-3 align-items-center pe-2">
                            <p class="fw-medium fs-5 m-0">{{ round($almacen->porcentaje, 2) }}%</p>
                            <div class="progress w-100" role="progressbar" aria-valuenow="{{ $almacen->porcentaje }}" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: {{ $almacen->porcentaje }}%"></div>
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
