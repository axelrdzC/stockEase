<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\InformeController;

Route::get('/', function () {
    return view('welcome');
});

/* rutas de inicio de sesion / registro generadas por laravel/ui */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    
    /* vistas users  */
    Route::get('/users/{user}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('users.show');

    Route::group(['namespace' => 'App\Http\Controllers'], function() {
        /* vistas productos  */
        Route::group(['prefix' => '/productos'], function() {
            Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
            Route::get('/create', [ProductoController::class, 'create'])->name('productos.create');
            Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
            Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
            Route::patch('/{producto}', [ProductoController::class, 'update'])->name('productos.update');
            Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
        });

        /* vistas almacenes  */
        Route::group(['prefix' => '/almacenes'], function() {
            Route::get('/', [AlmacenController::class, 'index'])->name('almacenes.index');
            Route::get('/create', [AlmacenController::class, 'create'])->name('almacenes.create');
            Route::post('/almacenes', [AlmacenController::class, 'store'])->name('almacenes.store');
            Route::get('/{almacen}/edit', [AlmacenController::class, 'edit'])->name('almacenes.edit');
            Route::patch('/{almacen}', [AlmacenController::class, 'update'])->name('almacenes.update');
            Route::delete('/{almacen}', [AlmacenController::class, 'destroy'])->name('almacenes.destroy');
        });

        # vistas categorias
        Route::group(['prefix' => '/categoria'], function() {
            Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
            Route::get('/create', [CategoriaController::class, 'create'])->name('categorias.create');
            Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
        });
        
         /* vistas clientes  */
        Route::group(['prefix' => '/clientes'], function() {
            Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
            Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');
            Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
            Route::get('/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
            Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
        });

        /* vistas proveedores  */
        Route::group(['prefix' => '/proveedores'], function() {
            Route::get('/', [ProveedorController::class, 'index'])->name('proveedores.index');
            Route::get('/create', [ProveedorController::class, 'create'])->name('proveedores.create');
            Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
            Route::get('/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
            Route::patch('/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');
            Route::delete('/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');
        });

        /* vistas ordenes  */
        Route::group(['prefix' => '/ordenes'], function() {
            Route::get('/', [App\Http\Controllers\OrdenController::class, 'index'])->name('ordenes.index');
        });

        /* vistas informes  */
        Route::group(['prefix' => '/informes'], function() {
            Route::get('/informes', [App\Http\Controllers\InformeController::class, 'index'])->name('informes.index');
        });
    });   
});
