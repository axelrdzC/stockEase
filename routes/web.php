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
        Route::group(['prefix' => 'modulo/productos'], function() {
            Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
            Route::get('/create', [ProductoController::class, 'createGeneral'])->name('productos.create.general');
            Route::post('/produtos', [ProductoController::class, 'storeGeneral'])->name('productos.store.general');
            Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
            Route::patch('/{producto}', [ProductoController::class, 'update'])->name('productos.update');
            Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
        });

        /* vistas almacenes  */
        Route::group(['prefix' => 'modulo/almacenes'], function() {
            Route::get('/', [AlmacenController::class, 'index'])->name('almacenes.index');
            Route::get('/create', [AlmacenController::class, 'create'])->name('almacenes.create.general');
            Route::post('/almacenes', [AlmacenController::class, 'store'])->name('almacenes.store.general');
            Route::get('/{almacen}/edit', [AlmacenController::class, 'edit'])->name('almacenes.edit');
            Route::patch('/{almacen}', [AlmacenController::class, 'update'])->name('almacenes.update');
            Route::delete('/{almacen}', [AlmacenController::class, 'destroy'])->name('almacenes.destroy');
        });

        # vistas categorias
        Route::group(['prefix' => 'modulo/categoria'], function() {
            Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
            Route::get('/create', [CategoriaController::class, 'create'])->name('categorias.create');
            Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
        });
        
         /* vistas clientes  */
        Route::group(['prefix' => 'modulo/clientes'], function() {
            Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
            Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create.general');
            Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store.general');
            Route::get('/create/{cliente}/ubicacion', [ClienteController::class, 'createUbi'])->name('clientes.create.ubicacion');
            Route::post('/create/{cliente}/ubicacion', [ClienteController::class, 'storeFinal'])->name('clientes.store.final');
            Route::get('/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
            Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
        });

        /* vistas proveedores  */
        Route::group(['prefix' => 'modulo/proveedores'], function() {
            Route::get('/', [ProveedorController::class, 'index'])->name('proveedores.index');
            Route::get('/create', [ProveedorController::class, 'create'])->name('proveedores.create.general');
            Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store.general');
            Route::get('/create/{proveedor}/ubicacion', [ProveedorController::class, 'createUbi'])->name('proveedores.create.ubicacion');
            Route::post('/create/{proveedor}/ubicacion', [ProveedorController::class, 'storeFinal'])->name('proveedores.store.final');
            Route::get('/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
            Route::patch('/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');
            Route::get('/{proveedor}/editDos', [ProveedorController::class, 'editDos'])->name('proveedores.editDos');
            Route::patch('/{proveedor}/dos', [ProveedorController::class, 'updateDos'])->name('proveedores.updateDos');
            Route::delete('/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');
        });

        /* vistas ordenes  */
        Route::group(['prefix' => 'modulo/ordenes'], function() {
            Route::get('/', [App\Http\Controllers\OrdenController::class, 'index'])->name('ordenes.index');
        });

        /* vistas informes  */
        Route::group(['prefix' => 'modulo/informes'], function() {
            Route::get('/informes', [App\Http\Controllers\InformeController::class, 'index'])->name('informes.index');
        });
    });   
});
