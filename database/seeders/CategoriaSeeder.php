<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

        Categoria::create([
            'nombre' => 'Electrónica',
            'descripcion' => 'Dispositivos y accesorios electrónicos',
            'tipo' => 'producto',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Categoria::create([
            'nombre' => 'Ropa',
            'descripcion' => 'Prendas de vestir para todas las edades',
            'tipo' => 'producto',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Categoria::create([
            'nombre' => 'Hogar',
            'descripcion' => 'Productos para el hogar y cocina',
            'tipo' => 'producto',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Categoria::create([
            'nombre' => 'Mayorista',
            'descripcion' => 'Empresarios con manejo de grandes volumenes',
            'tipo' => 'persona',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Categoria::create([
            'nombre' => 'Minorista',
            'descripcion' => 'Empresarios con manejo de pequeños volumenes',
            'tipo' => 'persona',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
