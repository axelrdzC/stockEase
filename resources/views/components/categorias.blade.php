<ul class="nav nav-pills gap-3 d-flex justify-content-center align-items-center">
    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link p-3 px-4 {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
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
        <a class="nav-link {{ request()->is('productos*') ? 'active' : ''}}" href="{{ route('productos.index') }}">
            <svg width="24" height="24" class="nav-icon me-2">
                <path d="M13.7729 8.30504V5.27304C13.7729 3.18904 12.0839 1.50004 10.0009 1.50004C7.91688 1.49104 6.21988 3.17204 6.21088 5.25604V5.27304V8.30504" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                <path fill="none" fill-rule="evenodd" clip-rule="evenodd" d="M14.7422 20.0003H5.25778C2.90569 20.0003 1 18.0953 1 15.7453V10.2293C1 7.87933 2.90569 5.97433 5.25778 5.97433H14.7422C17.0943 5.97433 19 7.87933 19 10.2293V15.7453C19 18.0953 17.0943 20.0003 14.7422 20.0003Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text {{ request()->is('productos*') ? '' : 'd-none' }}">{{ __('Productos') }}</span>
        </a>
    </li>

</ul>