<?php

use App\Http\Controllers\SeccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\NotifController;

Route::get('/', function () {
    return view('welcome');
});

/* rutas de inicio de sesion / registro generadas por laravel/ui */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    /* vistas users  */
    Route::get('/users/{user}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('users.destroy');

    Route::get('/configuracion', [App\Http\Controllers\ConfigController::class, 'show'])->name('configuracion');
    Route::get('/notificaciones', [NotifController::class, 'index'])->name('notificaciones.index');
    Route::get('/notificaciones/{id}', [NotifController::class, 'show'])->name('notificaciones.mostrar');

    Route::group(['namespace' => 'App\Http\Controllers'], function() {

        # vistas productos
        Route::group(['prefix' => '/productos'], function() {
            Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
            Route::get('/create', [ProductoController::class, 'create'])->name('productos.create');
            Route::get('/{producto}', [ProductoController::class, 'show'])->name('productos.show');
            Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
            Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
            Route::patch('/{producto}', [ProductoController::class, 'update'])->name('productos.update');
            Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
            Route::delete('/', [ProductoController::class, 'destroyAll'])->name('productos.destroyAll');
            Route::post('/moveToSection/{seccion}', [ProductoController::class, 'moveToSection'])->name('productos.moveToSection');
            Route::post('/moveToAlmacen/{almacen}', [ProductoController::class, 'moveToAlmacen'])->name('productos.moveToAlmacen');
        });

        # vistas almacenes
        Route::group(['prefix' => '/almacenes'], function() {
            Route::get('/', [AlmacenController::class, 'index'])->name('almacenes.index');
            Route::get('/create', [AlmacenController::class, 'create'])->name('almacenes.create');
            Route::get('/{almacen}', [AlmacenController::class, 'show'])->name('almacenes.show');
            Route::post('/almacenes', [AlmacenController::class, 'store'])->name('almacenes.store');
            Route::get('/{almacen}/edit', [AlmacenController::class, 'edit'])->name('almacenes.edit');
            Route::patch('/{almacen}', [AlmacenController::class, 'update'])->name('almacenes.update');
            Route::delete('/{almacen}', [AlmacenController::class, 'destroy'])->name('almacenes.destroy');
            Route::get('/{almacen}', [AlmacenController::class, 'show'])->name('almacenes.show');

        });

        # secciones maybe
        Route::group(['prefix' => '/secciones'], function() {
            Route::get('/', [SeccionController::class, 'index'])->name('secciones.index');
            Route::get('/{seccion}', [SeccionController::class, 'show'])->name('secciones.show');
            Route::get('/{seccion}/edit', [SeccionController::class, 'edit'])->name('secciones.edit');
            Route::patch('/{seccion}', [SeccionController::class, 'update'])->name('secciones.update');
            Route::post('/{almacen}', [SeccionController::class, 'store'])->name('secciones.store');
        });


        # vistas categorias
        Route::group(['prefix' => '/categoria'], function() {
            Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
            Route::get('/create', [CategoriaController::class, 'create'])->name('categorias.create');
            Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
        });

        # vistas clientes
        Route::group(['prefix' => '/clientes'], function() {
            Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
            Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');
            Route::get('/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
            Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
            Route::get('/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
            Route::patch('/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
            Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
        });

        # vistas proveedores
        Route::group(['prefix' => '/proveedores'], function() {
            Route::get('/', [ProveedorController::class, 'index'])->name('proveedores.index');
            Route::get('/create', [ProveedorController::class, 'create'])->name('proveedores.create');
            Route::get('/{proveedor}', [ProveedorController::class, 'show'])->name('proveedores.show');
            Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
            Route::get('/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
            Route::patch('/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');
            Route::delete('/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');
        });

        # rutas de ordenes de COMPRA
        Route::group(['prefix' => '/ordenes/compra'], function() {

            Route::get('/', [OrdenController::class, 'indexCompra'])->name('ordenes.compra.index');
            Route::get('/create', [OrdenController::class, 'createCompra'])->name('ordenes.compra.create');
            Route::get('/{orden}', [OrdenController::class, 'show'])->name('ordenes.compra.show');
            Route::post('/', [OrdenController::class, 'storeCompra'])->name('ordenes.compra.store');
            Route::get('/{orden}/edit', [OrdenController::class, 'editCompra'])->name('ordenes.compra.edit');
            Route::patch('/{orden}', [OrdenController::class, 'updateCompra'])->name('ordenes.compra.update');
            Route::delete('/{orden}', [OrdenController::class, 'destroyCompra'])->name('ordenes.compra.destroy');

        });

        # rutas de ordenes de VENTA
        Route::group(['prefix' => '/ordenes/venta'], function() {

            Route::get('/', [OrdenController::class, 'indexVenta'])->name('ordenes.venta.index');
            Route::get('/create', [OrdenController::class, 'createVenta'])->name('ordenes.venta.create');
            Route::post('/', [OrdenController::class, 'storeVenta'])->name('ordenes.venta.store');
            Route::get('/{orden}/edit', [OrdenController::class, 'editVenta'])->name('ordenes.venta.edit');
            Route::patch('/{orden}', [OrdenController::class, 'updateVenta'])->name('ordenes.venta.update');
            Route::delete('/{orden}', [OrdenController::class, 'destroyVenta'])->name('ordenes.venta.destroy');

        });

        # rutas de informes
        Route::group(['prefix' => '/informes'], function() {
            Route::get('/', [InformeController::class, 'index'])->name('informes.index');
            Route::get('/{informe}/show', [InformeController::class, 'show'])->name('informes.show');
            Route::post('/', [InformeController::class, 'store'])->name('informes.store');
            Route::get('/{id}/export-pdf', [InformeController::class, 'exportPDF'])->name('informes.exportPDF');
        });
    });
});
