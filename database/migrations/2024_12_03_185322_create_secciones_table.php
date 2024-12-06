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
        
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('capacidad');
            $table->unsignedBigInteger('almacen_id');
            $table->foreign('almacen_id')->references('id')->on('almacenes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('seccion_id')->nullable();
            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign(['seccion_id']);
            $table->dropColumn('seccion_id');
        });
        Schema::dropIfExists('secciones');
    }
};
