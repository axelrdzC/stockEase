<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* rutas de inicio de sesion / registro generadas por laravel/ui */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    
    /* vistas users  */
    Route::get('/users/{user}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('users.show');

    /* vistas productos  */
    Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');

    Route::get('/productos/create/general', [App\Http\Controllers\ProductoController::class, 'createGeneral'])->name('productos.create.general');
    Route::post('/productos', [App\Http\Controllers\ProductoController::class, 'storeGeneral'])->name('productos.store.general');
    
    Route::get('/productos/{producto}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
    Route::patch('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy');

    /* vistas clientes  */
    Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
    
    /* vistas almacenes  */
    Route::get('/almacenes', [App\Http\Controllers\AlmacenController::class, 'index'])->name('almacenes.index');
    Route::get('/almacenes/create', [App\Http\Controllers\AlmacenController::class, 'create'])->name('almacenes.create');
    Route::post('/almacenes', [App\Http\Controllers\AlmacenController::class, 'store'])->name('almacenes.store');


    /* vistas ordenes  */
    Route::get('/ordenes', [App\Http\Controllers\OrdenController::class, 'index'])->name('ordenes.index');
    
    /* vistas proveedores  */
    Route::get('/proveedores', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores.index');

    /* vistas informes  */
    Route::get('/informes', [App\Http\Controllers\InformeController::class, 'index'])->name('informes.index');

});
