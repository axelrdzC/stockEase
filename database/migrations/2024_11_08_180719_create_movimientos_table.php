<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_movimiento', ['entrada','salida','transferencia']);
            $table->integer('cantidad_productos');
            $table->date('fecha_caducidad');
            $table->integer('id_almacen_origen');
            $table->foreign('id_almacen_origen')->references('id')->on('almacenes');
            $table->integer('id_almacen_destino');
            $table->foreign('id_almacen_destino')->references('id')->on('almacenes');
            $table->integer('id_producto');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
