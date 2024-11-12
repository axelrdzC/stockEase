<ul class="nav nav-pills gap-3 d-flex justify-content-center align-items-center">
    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
            <svg width="24" height="24" class="nav-icon me-2">
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M14 17.5C14 14.8748 14.0281 14 17.5 14C20.97189 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium {{ request()->is('home') ? '' : 'd-none' }}">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('productos*') ? 'active' : ''}}" href="{{ route('productos.index') }}">
            <svg width="24" height="24" class="nav-icon me-2">
                <path d="M13.7729 8.30504V5.27304C13.7729 3.18904 12.0839 1.50004 10.0009 1.50004C7.91688 1.49104 6.21988 3.17204 6.21088 5.25604V5.27304V8.30504" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M14.7422 20.0003H5.25778C2.90569 20.0003 1 18.0953 1 15.7453V10.2293C1 7.87933 2.90569 5.97433 5.25778 5.97433H14.7422C17.0943 5.97433 19 7.87933 19 10.2293V15.7453C19 18.0953 17.0943 20.0003 14.7422 20.0003Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium {{ request()->is('productos*') ? '' : 'd-none' }}">{{ __('Productos') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('clientes*') ? 'active' : ''}}" href="{{ route('clientes.index') }}">
            <svg width="24" height="24" class="nav-icon me-2">
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M7.59151 13.2068C11.2805 13.2068 14.4335 13.7658 14.4335 15.9988C14.4335 18.2318 11.3015 18.8068 7.59151 18.8068C3.90151 18.8068 0.749512 18.2528 0.749512 16.0188C0.749512 13.7848 3.88051 13.2068 7.59151 13.2068Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M7.59151 10.0198C5.16951 10.0198 3.20551 8.05679 3.20551 5.63479C3.20551 3.21279 5.16951 1.24979 7.59151 1.24979C10.0125 1.24979 11.9765 3.21279 11.9765 5.63479C11.9855 8.04779 10.0355 10.0108 7.62251 10.0198H7.59151Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M14.4831 8.88159C16.0841 8.65659 17.3171 7.28259 17.3201 5.61959C17.3201 3.98059 16.1251 2.62059 14.5581 2.36359" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M16.5954 12.7322C18.1464 12.9632 19.2294 13.5072 19.2294 14.6272C19.2294 15.3982 18.7194 15.8982 17.8954 16.2112" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium {{ request()->is('clientes*') ? '' : 'd-none' }}">{{ __('Clientes') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('almacenes*') ? 'active' : ''}}" href="{{ route('almacenes.index') }}">
            <svg width="20" height="20" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="nav-icon me-2">
                <g clip-path="url(#clip0_381_1442)">
                    <path d="M14.167 0.5H5.83366C4.729 0.501323 3.66996 0.940735 2.88884 1.72185C2.10773 2.50296 1.66832 3.562 1.66699 4.66667V16.3333C1.66832 17.438 2.10773 18.497 2.88884 19.2781C3.66996 20.0593 4.729 20.4987 5.83366 20.5H14.167C15.2717 20.4987 16.3307 20.0593 17.1118 19.2781C17.8929 18.497 18.3323 17.438 18.3337 16.3333V4.66667C18.3323 3.562 17.8929 2.50296 17.1118 1.72185C16.3307 0.940735 15.2717 0.501323 14.167 0.5V0.5ZM5.83366 2.16667H14.167C14.83 2.16667 15.4659 2.43006 15.9348 2.8989C16.4036 3.36774 16.667 4.00362 16.667 4.66667V9.66666H3.33366V4.66667C3.33366 4.00362 3.59705 3.36774 4.06589 2.8989C4.53473 2.43006 5.17062 2.16667 5.83366 2.16667V2.16667ZM14.167 18.8333H5.83366C5.17062 18.8333 4.53473 18.5699 4.06589 18.1011C3.59705 17.6323 3.33366 16.9964 3.33366 16.3333V11.3333H16.667V16.3333C16.667 16.9964 16.4036 17.6323 15.9348 18.1011C15.4659 18.5699 14.83 18.8333 14.167 18.8333Z" fill="#53545C"/>
                    <path d="M9.16634 6.33329H10.833C11.054 6.33329 11.266 6.24549 11.4223 6.08921C11.5785 5.93293 11.6663 5.72097 11.6663 5.49996C11.6663 5.27894 11.5785 5.06698 11.4223 4.9107C11.266 4.75442 11.054 4.66663 10.833 4.66663H9.16634C8.94533 4.66663 8.73337 4.75442 8.57709 4.9107C8.42081 5.06698 8.33301 5.27894 8.33301 5.49996C8.33301 5.72097 8.42081 5.93293 8.57709 6.08921C8.73337 6.24549 8.94533 6.33329 9.16634 6.33329V6.33329Z" fill="#374957"/>
                    <path d="M10.833 14.6666H9.16634C8.94533 14.6666 8.73337 14.7544 8.57709 14.9107C8.42081 15.067 8.33301 15.2789 8.33301 15.5C8.33301 15.721 8.42081 15.9329 8.57709 16.0892C8.73337 16.2455 8.94533 16.3333 9.16634 16.3333H10.833C11.054 16.3333 11.266 16.2455 11.4223 16.0892C11.5785 15.9329 11.6663 15.721 11.6663 15.5C11.6663 15.2789 11.5785 15.067 11.4223 14.9107C11.266 14.7544 11.054 14.6666 10.833 14.6666Z" fill="#374957"/>
                </g>
                <defs>
                    <clipPath id="clip0_381_1442">
                        <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
                    </clipPath>
                </defs>
            </svg>
            <span class="nav-text fw-medium {{ request()->is('almacenes*') ? '' : 'd-none' }}">{{ __('Almacenes') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('ordenes*') ? 'active' : ''}}" href="{{ route('ordenes.index') }}">
            <svg width="24" height="24" class="nav-icon me-2">
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M11.7378 0.761809H5.0848C3.0048 0.753809 1.2998 2.41181 1.2508 4.49081V15.2038C1.2048 17.3168 2.8798 19.0678 4.9928 19.1148C5.0238 19.1148 5.0538 19.1158 5.0848 19.1148H13.0738C15.1678 19.0298 16.8178 17.2998 16.8028 15.2038V6.03781L11.7378 0.761809Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M11.4751 0.75V3.659C11.4751 5.079 12.6231 6.23 14.0431 6.234H16.7981" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M11.2881 13.3585H5.88812" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M9.24321 9.60599H5.88721" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium {{ request()->is('ordenes*') ? '' : 'd-none' }}">{{ __('Ordenes') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('proveedores*') ? 'active' : ''}}" href="{{ route('proveedores.index') }}">
            <svg width="24" height="24" class="nav-icon me-2">
                <path fill="none" d="M0.750122 1.24991L2.83012 1.60991L3.79312 13.0829C3.87012 14.0199 4.65312 14.7389 5.59312 14.7359H16.5021C17.3991 14.7379 18.1601 14.0779 18.2871 13.1899L19.2361 6.63191C19.3421 5.89891 18.8331 5.21891 18.1011 5.11291C18.0371 5.10391 3.16412 5.09891 3.16412 5.09891" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M12.1251 8.7948H14.8981" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M5.15441 18.2025C5.45541 18.2025 5.69841 18.4465 5.69841 18.7465C5.69841 19.0475 5.45541 19.2915 5.15441 19.2915C4.85341 19.2915 4.61041 19.0475 4.61041 18.7465C4.61041 18.4465 4.85341 18.2025 5.15441 18.2025Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M16.4347 18.2025C16.7357 18.2025 16.9797 18.4465 16.9797 18.7465C16.9797 19.0475 16.7357 19.2915 16.4347 19.2915C16.1337 19.2915 15.8907 19.0475 15.8907 18.7465C15.8907 18.4465 16.1337 18.2025 16.4347 18.2025Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium {{ request()->is('proveedores*') ? '' : 'd-none' }}">{{ __('Proveedores') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('informes*') ? 'active' : ''}}" href="{{ route('informes.index') }}">
            <svg width="24" height="24" class="nav-icon me-2">
                <path fill="none" d="M6.37145 9.20172V16.0619" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M11.0381 5.91913V16.0618" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M15.6286 12.8268V16.0619" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium {{ request()->is('informes*') ? '' : 'd-none' }}">{{ __('Informes') }}</span>
        </a>
    </li>

</ul>