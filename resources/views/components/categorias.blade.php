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
            <span class="nav-text fw-bold {{ request()->is('home') ? '' : 'd-none' }}">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('productos*') ? 'active' : ''}}" href="{{ route('productos.index') }}">
            <svg width="24" height="24" class="nav-icon me-2">
                <path d="M13.7729 8.30504V5.27304C13.7729 3.18904 12.0839 1.50004 10.0009 1.50004C7.91688 1.49104 6.21988 3.17204 6.21088 5.25604V5.27304V8.30504" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M14.7422 20.0003H5.25778C2.90569 20.0003 1 18.0953 1 15.7453V10.2293C1 7.87933 2.90569 5.97433 5.25778 5.97433H14.7422C17.0943 5.97433 19 7.87933 19 10.2293V15.7453C19 18.0953 17.0943 20.0003 14.7422 20.0003Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text {{ request()->is('productos*') ? '' : 'd-none' }}">{{ __('Productos') }}</span>
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
            <span class="nav-text {{ request()->is('clientes*') ? '' : 'd-none' }}">{{ __('Clientes') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 " href="">
            <svg width="24" height="24" class="nav-icon me-2">
                <g clip-path="url(#clip0_53_456)">
                <path d="M14.1668 0H5.83348C4.72881 0.00132321 3.66977 0.440735 2.88866 1.22185C2.10754 2.00296 1.66813 3.062 1.66681 4.16667V15.8333C1.66813 16.938 2.10754 17.997 2.88866 18.7781C3.66977 19.5593 4.72881 19.9987 5.83348 20H14.1668C15.2715 19.9987 16.3305 19.5593 17.1116 18.7781C17.8927 17.997 18.3322 16.938 18.3335 15.8333V4.16667C18.3322 3.062 17.8927 2.00296 17.1116 1.22185C16.3305 0.440735 15.2715 0.00132321 14.1668 0V0ZM5.83348 1.66667H14.1668C14.8299 1.66667 15.4657 1.93006 15.9346 2.3989C16.4034 2.86774 16.6668 3.50362 16.6668 4.16667V9.16666H3.33348V4.16667C3.33348 3.50362 3.59687 2.86774 4.06571 2.3989C4.53455 1.93006 5.17043 1.66667 5.83348 1.66667V1.66667ZM14.1668 18.3333H5.83348C5.17043 18.3333 4.53455 18.0699 4.06571 17.6011C3.59687 17.1323 3.33348 16.4964 3.33348 15.8333V10.8333H16.6668V15.8333C16.6668 16.4964 16.4034 17.1323 15.9346 17.6011C15.4657 18.0699 14.8299 18.3333 14.1668 18.3333Z" fill="#53545C"/>
                <path d="M9.16652 5.83335H10.8332C11.0542 5.83335 11.2662 5.74555 11.4224 5.58927C11.5787 5.43299 11.6665 5.22103 11.6665 5.00002C11.6665 4.77901 11.5787 4.56704 11.4224 4.41076C11.2662 4.25448 11.0542 4.16669 10.8332 4.16669H9.16652C8.94551 4.16669 8.73355 4.25448 8.57727 4.41076C8.42099 4.56704 8.33319 4.77901 8.33319 5.00002C8.33319 5.22103 8.42099 5.43299 8.57727 5.58927C8.73355 5.74555 8.94551 5.83335 9.16652 5.83335V5.83335Z" fill="#374957"/>
                <path d="M10.8332 14.1667H9.16652C8.94551 14.1667 8.73355 14.2545 8.57727 14.4107C8.42099 14.567 8.33319 14.779 8.33319 15C8.33319 15.221 8.42099 15.433 8.57727 15.5893C8.73355 15.7455 8.94551 15.8333 9.16652 15.8333H10.8332C11.0542 15.8333 11.2662 15.7455 11.4224 15.5893C11.5787 15.433 11.6665 15.221 11.6665 15C11.6665 14.779 11.5787 14.567 11.4224 14.4107C11.2662 14.2545 11.0542 14.1667 10.8332 14.1667Z" fill="#374957"/>
                </g>
                <defs>
                <clipPath id="clip0_53_456">
                <rect width="20" height="20" fill="white"/>
                </clipPath>
                </defs>   
            </svg>
            <span class="nav-text">{{ __('Almacenes') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 " href="">
            <svg width="24" height="24" class="nav-icon me-2">
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M11.7378 0.761809H5.0848C3.0048 0.753809 1.2998 2.41181 1.2508 4.49081V15.2038C1.2048 17.3168 2.8798 19.0678 4.9928 19.1148C5.0238 19.1148 5.0538 19.1158 5.0848 19.1148H13.0738C15.1678 19.0298 16.8178 17.2998 16.8028 15.2038V6.03781L11.7378 0.761809Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M11.4751 0.75V3.659C11.4751 5.079 12.6231 6.23 14.0431 6.234H16.7981" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M11.2881 13.3585H5.88812" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M9.24321 9.60599H5.88721" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text">{{ __('Ordenes') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 " href="">
            <svg width="24" height="24" class="nav-icon me-2">
                <path fill="none" d="M0.750122 1.24991L2.83012 1.60991L3.79312 13.0829C3.87012 14.0199 4.65312 14.7389 5.59312 14.7359H16.5021C17.3991 14.7379 18.1601 14.0779 18.2871 13.1899L19.2361 6.63191C19.3421 5.89891 18.8331 5.21891 18.1011 5.11291C18.0371 5.10391 3.16412 5.09891 3.16412 5.09891" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M12.1251 8.7948H14.8981" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M5.15441 18.2025C5.45541 18.2025 5.69841 18.4465 5.69841 18.7465C5.69841 19.0475 5.45541 19.2915 5.15441 19.2915C4.85341 19.2915 4.61041 19.0475 4.61041 18.7465C4.61041 18.4465 4.85341 18.2025 5.15441 18.2025Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M16.4347 18.2025C16.7357 18.2025 16.9797 18.4465 16.9797 18.7465C16.9797 19.0475 16.7357 19.2915 16.4347 19.2915C16.1337 19.2915 15.8907 19.0475 15.8907 18.7465C15.8907 18.4465 16.1337 18.2025 16.4347 18.2025Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text">{{ __('Proveedores') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 " href="">
            <svg width="24" height="24" class="nav-icon me-2">
                <path fill="none" d="M6.37145 9.20172V16.0619" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M11.0381 5.91913V16.0618" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" d="M15.6286 12.8268V16.0619" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text">{{ __('Informes') }}</span>
        </a>
    </li>

</ul>