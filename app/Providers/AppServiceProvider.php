<?php

namespace App\Providers;

use App\Models\Producto;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Almacen;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['productos.create', 'productos.index', 'proveedores.create', 'productos.edit', 'ordenes.compra.create', 'ordenes.compra.edit'], function ($view) {
            $view->with('proveedores', Proveedor::all());
        });

        View::composer(['productos.create', 'productos.index', 'productos.edit', 'proveedores.form', 'proveedores.index', 'clientes.create', 'clientes.index', 'clientes.edit'], function ($view) {
            $view->with('categorias', Categoria::all());
        });

        View::composer([], function ($view) {
            $view->with('productos', Producto::all());
        });

        View::composer(['productos.create', 'productos.index', 'productos.edit', 'home', 'livewire.home-component', 'informes.index'], function ($view) {
            $view->with('almacenes', Almacen::all());
        });
    }
}
