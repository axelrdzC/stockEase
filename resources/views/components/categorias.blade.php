<ul class="nav nav-pills gap-3 d-flex justify-content-center align-items-center">
    <!-- dashboard -->
    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}" title="{{ __('Dashboard') }}">
            <svg width="24" height="24" class="nav-icon" fill="none">
                <g clip-path="url(#clip0_30789_32112)">
                    <path stroke="#53545C" d="M18.266 19.3475C17.8985 19.4998 17.4325 19.4998 16.5007 19.4998C15.569 19.4998 15.1029 19.4998 14.7354 19.3475C14.2453 19.1445 13.8559 18.7552 13.6529 18.2651C13.5007 17.8976 13.5007 17.4316 13.5007 16.4997C13.5007 15.5684 13.5007 15.1018 13.6529 14.7344C13.8559 14.2443 14.2453 13.855 14.7353 13.652C15.1029 13.4997 15.5688 13.4997 16.5007 13.4997C17.4326 13.4997 17.8978 13.5004 18.2654 13.6527C18.7554 13.8556 19.1448 14.245 19.3478 14.7351C19.5001 15.1026 19.5007 15.5678 19.5007 16.4997C19.5007 17.4316 19.5007 17.8976 19.3485 18.2651C19.1455 18.7552 18.7561 19.1445 18.266 19.3475Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path stroke="#53545C" d="M9.26597 19.3479C8.89843 19.5001 8.43248 19.5001 7.5006 19.5001C6.56898 19.5001 6.10279 19.5001 5.7353 19.3479C5.24524 19.1449 4.85585 18.7555 4.65286 18.2654C4.50062 17.8979 4.50062 17.4319 4.50062 16.5001C4.50062 15.5687 4.50062 15.1022 4.65282 14.7347C4.85581 14.2447 5.2452 13.8553 5.73525 13.6523C6.1028 13.5001 6.56874 13.5001 7.50062 13.5001C8.4325 13.5001 8.89776 13.5008 9.2653 13.653C9.75536 13.856 10.1448 14.2454 10.3477 14.7354C10.5 15.103 10.5006 15.5682 10.5006 16.5001C10.5006 17.432 10.5006 17.8979 10.3484 18.2654C10.1454 18.7555 9.75603 19.1449 9.26597 19.3479Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path stroke="#53545C" d="M16.501 10.4997C15.5694 10.4997 15.1032 10.4997 14.7357 10.3475C14.2457 10.1445 13.8563 9.75508 13.6533 9.26502C13.501 8.89748 13.501 8.43153 13.501 7.49966C13.501 6.56831 13.501 6.10176 13.6532 5.73432C13.8562 5.24427 14.2456 4.85488 14.7357 4.65189C15.1032 4.49965 15.5692 4.49965 16.501 4.49965C17.4329 4.49965 17.8982 4.50034 18.2657 4.65258C18.7558 4.85557 19.1452 5.24496 19.3482 5.73501C19.5004 6.10255 19.501 6.56779 19.501 7.49966C19.501 8.43153 19.501 8.89748 19.3488 9.26502C19.1458 9.75508 18.7564 10.1444 18.2664 10.3474C17.8989 10.4997 17.4329 10.4997 16.501 10.4997Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path stroke="#53545C" d="M9.26597 10.3474C8.89843 10.4997 8.43248 10.4997 7.5006 10.4997C6.56898 10.4997 6.10279 10.4997 5.7353 10.3475C5.24524 10.1445 4.85585 9.75508 4.65286 9.26502C4.50062 8.89748 4.50062 8.43153 4.50062 7.49966C4.50062 6.56831 4.50062 6.10176 4.65282 5.73432C4.85581 5.24427 5.2452 4.85488 5.73525 4.65189C6.1028 4.49965 6.56874 4.49965 7.50062 4.49965C8.4325 4.49965 8.89776 4.50034 9.2653 4.65258C9.75536 4.85557 10.1448 5.24496 10.3477 5.73501C10.5 6.10256 10.5006 6.56777 10.5006 7.49966C10.5006 8.43153 10.5006 8.89748 10.3484 9.26502C10.1454 9.75508 9.75603 10.1444 9.26597 10.3474Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <clipPath id="clip0_30789_32112">
                        <rect width="24" height="24" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('home') ? '' : 'd-none' }}">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <!-- productos -->
    <li class="nav-item">
        <a class="nav-link p-2 px-3 align-items-center {{ request()->is('productos*') ? 'active' : ''}}" href="{{ route('productos.index') }}" title="{{ __('Productos') }}">
            <svg width="24" height="24" class="nav-icon">
                <path d="M9 8C9 9.65685 10.3431 11 12 11C13.6569 11 15 9.65685 15 8M3 16.8002V7.2002C3 6.08009 3 5.51962 3.21799 5.0918C3.40973 4.71547 3.71547 4.40973 4.0918 4.21799C4.51962 4 5.08009 4 6.2002 4H17.8002C18.9203 4 19.4796 4 19.9074 4.21799C20.2837 4.40973 20.5905 4.71547 20.7822 5.0918C21 5.5192 21 6.07899 21 7.19691V16.8036C21 17.9215 21 18.4805 20.7822 18.9079C20.5905 19.2842 20.2837 19.5905 19.9074 19.7822C19.48 20 18.921 20 17.8031 20H6.19691C5.07899 20 4.5192 20 4.0918 19.7822C3.71547 19.5905 3.40973 19.2842 3.21799 18.9079C3 18.4801 3 17.9203 3 16.8002Z" stroke="#53545C" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('productos*') ? '' : 'd-none' }}">{{ __('Productos') }}</span>
        </a>
    </li>

    <!-- clientes -->
    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('clientes*') ? 'active' : ''}}" href="{{ route('clientes.index') }}" title="{{ __('Clientes') }}">
            <svg width="24" height="24" class="nav-icon">
                <path d="M21 19.9999C21 18.2583 19.3304 16.7767 17 16.2275M15 20C15 17.7909 12.3137 16 9 16C5.68629 16 3 17.7909 3 20M15 13C17.2091 13 19 11.2091 19 9C19 6.79086 17.2091 5 15 5M9 13C6.79086 13 5 11.2091 5 9C5 6.79086 6.79086 5 9 5C11.2091 5 13 6.79086 13 9C13 11.2091 11.2091 13 9 13Z" stroke="#53545C" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('clientes*') ? '' : 'd-none' }}">{{ __('Clientes') }}</span>
        </a>
    </li>

    <!-- almacenes (only admins & super-admins) -->
    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('almacenes*') ? 'active' : ''}}" href="{{ route('almacenes.index') }}" title="{{ __('Almacenes') }}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="nav-icon">
                <path d="M2 20H4M4 20H15M4 20V14.3682C4 13.8428 4 13.58 4.063 13.335C4.11883 13.1178 4.21073 12.9118 4.33496 12.7252C4.47505 12.5147 4.67114 12.3384 5.06152 11.9877L7.3631 9.91997C8.11784 9.24192 8.49549 8.90264 8.92249 8.77393C9.29894 8.66045 9.7007 8.66045 10.0771 8.77393C10.5045 8.90275 10.8827 9.2422 11.6387 9.92139L13.9387 11.9877C14.3295 12.3388 14.5245 12.5146 14.6647 12.7252C14.7889 12.9118 14.8807 13.1178 14.9365 13.335C14.9995 13.58 15 13.8428 15 14.3682V20M15 20H20M20 20H22M20 20V7.19691C20 6.07899 20 5.5192 19.7822 5.0918C19.5905 4.71547 19.2837 4.40973 18.9074 4.21799C18.4796 4 17.9203 4 16.8002 4H10.2002C9.08009 4 8.51962 4 8.0918 4.21799C7.71547 4.40973 7.40973 4.71547 7.21799 5.0918C7 5.51962 7 6.08009 7 7.2002V10.0002" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('almacenes*') ? '' : 'd-none' }}">{{ __('Almacenes') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('ordenes*') ? 'active' : ''}}" href="{{ route('ordenes.compra.index') }}" title="{{ __('Órdenes') }}">
            <svg width="24" height="24" class="nav-icon">
                <path d="M9 17H15M9 14H15M13.0004 3.00087C12.9048 3 12.7974 3 12.6747 3H8.2002C7.08009 3 6.51962 3 6.0918 3.21799C5.71547 3.40973 5.40973 3.71547 5.21799 4.0918C5 4.51962 5 5.08009 5 6.2002V17.8002C5 18.9203 5 19.4801 5.21799 19.9079C5.40973 20.2842 5.71547 20.5905 6.0918 20.7822C6.51921 21 7.079 21 8.19694 21L15.8031 21C16.921 21 17.48 21 17.9074 20.7822C18.2837 20.5905 18.5905 20.2842 18.7822 19.9079C19 19.4805 19 18.9215 19 17.8036V9.32568C19 9.20302 18.9999 9.09553 18.999 9M13.0004 3.00087C13.2858 3.00348 13.4657 3.01407 13.6382 3.05547C13.8423 3.10446 14.0379 3.18526 14.2168 3.29492C14.4186 3.41857 14.5918 3.59181 14.9375 3.9375L18.063 7.06298C18.4089 7.40889 18.5809 7.58136 18.7046 7.78319C18.8142 7.96214 18.8953 8.15726 18.9443 8.36133C18.9857 8.53379 18.9964 8.71454 18.999 9M13.0004 3.00087L13 5.80021C13 6.92031 13 7.48015 13.218 7.90797C13.4097 8.2843 13.7155 8.59048 14.0918 8.78223C14.5192 9 15.079 9 16.1969 9H18.999" stroke="#53545C" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('ordenes*') ? '' : 'd-none' }}">{{ __('Órdenes') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('proveedores*') ? 'active' : ''}}" href="{{ route('proveedores.index') }}" title="{{ __('Proveedores') }}">
            <svg width="24" height="24" class="nav-icon">
                <path d="M3 3H3.26835C3.74213 3 3.97943 3 4.17267 3.08548C4.34304 3.16084 4.48871 3.28218 4.59375 3.43604C4.71269 3.61026 4.75564 3.8429 4.84137 4.30727L7.00004 16L17.4218 16C17.875 16 18.1023 16 18.29 15.9199C18.4559 15.8492 18.5989 15.7346 18.7051 15.5889C18.8252 15.4242 18.8761 15.2037 18.9777 14.7631L18.9785 14.76L20.5477 7.95996L20.5481 7.95854C20.7023 7.29016 20.7796 6.95515 20.6947 6.69238C20.6202 6.46182 20.4635 6.26634 20.2556 6.14192C20.0184 6 19.6758 6 18.9887 6H5.5M18 21C17.4477 21 17 20.5523 17 20C17 19.4477 17.4477 19 18 19C18.5523 19 19 19.4477 19 20C19 20.5523 18.5523 21 18 21ZM8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20C9 20.5523 8.55228 21 8 21Z" stroke="#53545C" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('proveedores*') ? '' : 'd-none' }}">{{ __('Proveedores') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('informes*') ? 'active' : ''}}" href="{{ route('informes.index') }}" title="{{ __('Informes') }}">
            <svg width="24" height="24" class="nav-icon" fill="none">
                <path d="M9 11V20M9 11H4.59961C4.03956 11 3.75981 11 3.5459 11.109C3.35774 11.2049 3.20487 11.3577 3.10899 11.5459C3 11.7598 3 12.04 3 12.6001V20H9M9 11V5.6001C9 5.04004 9 4.75981 9.10899 4.5459C9.20487 4.35774 9.35774 4.20487 9.5459 4.10899C9.75981 4 10.0396 4 10.5996 4H13.3996C13.9597 4 14.2403 4 14.4542 4.10899C14.6423 4.20487 14.7948 4.35774 14.8906 4.5459C14.9996 4.75981 15 5.04005 15 5.6001V8M9 20H15M15 20L21 20.0001V9.6001C21 9.04005 20.9996 8.75981 20.8906 8.5459C20.7948 8.35774 20.6429 8.20487 20.4548 8.10899C20.2409 8 19.9601 8 19.4 8H15M15 20V8" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('informes*') ? '' : 'd-none' }}">{{ __('Informes') }}</span>
        </a>
    </li>

</ul>