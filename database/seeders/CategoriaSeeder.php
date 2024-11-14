<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Electrónica',
                'descripcion' => 'Dispositivos y accesorios electrónicos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ropa',
                'descripcion' => 'Prendas de vestir para todas las edades',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Hogar',
                'descripcion' => 'Productos para el hogar y cocina',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
