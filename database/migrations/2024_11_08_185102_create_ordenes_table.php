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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre')->nullable(); // Campo opcional
            $table->enum('estado', ['pendiente', 'completada', 'cancelada']); 
            $table->date('fecha'); 
            $table->decimal('total', 10, 2); 
            $table->string('tipo');
            
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
            
            $table->timestamps(); 
        });

        Schema::create('orden_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orden_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        
            $table->foreign('orden_id')->references('id')->on('ordenes')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_producto');
        Schema::dropIfExists('ordenes');
    }
};
