<?php

namespace App\Providers;

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
        View::composer(['productos.create.general', 'productos.index', 'proveedores.create', 'productos.edit'], function ($view) {
            $view->with('proveedores', Proveedor::all());
        });

        View::composer(['productos.create.general', 'productos.index', 'productos.edit'], function ($view) {
            $view->with('categorias', Categoria::all());
        });

        View::composer(['productos.create.general', 'productos.index', 'productos.edit'], function ($view) {
            $view->with('almacenes', Almacen::all());
        });
    }
}
