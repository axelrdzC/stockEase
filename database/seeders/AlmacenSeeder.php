<?php

namespace Database\Seeders;

use App\Models\Almacen;
use Illuminate\Database\Seeder;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Almacen::create([
            'nombre' => 'Zona',
            'pais' => 'Estados Unidos',
            'estado' => 'Nuevo León',
            'ciudad' => 'Ciudad Victoria',
            'colonia' => 'Zona Centro, Calle Hidalgo',
            'codigo_p' => '09876',
            'seccion' => 'a',
            'capacidad' => 2000,
            'img' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Almacen::create([
            'nombre' => 'Zona',
            'pais' => 'Estados Unidos',
            'estado' => 'Nuevo León',
            'ciudad' => 'Ciudad Victoria',
            'colonia' => 'Zona Centro, Calle Hidalgo',
            'codigo_p' => '09876',
            'seccion' => 'a',
            'capacidad' => 2000,
            'img' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Almacen::create([
            'nombre' => 'Zona',
            'pais' => 'Estados Unidos',
            'estado' => 'Nuevo León',
            'ciudad' => 'Ciudad Victoria',
            'colonia' => 'Zona Centro, Calle Hidalgo',
            'codigo_p' => '09876',
            'seccion' => 'a',
            'capacidad' => 1500,
            'img' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Almacen::create([
            'nombre' => 'Eusexua',
            'pais' => 'Estados Unidos',
            'estado' => 'Nuevo León',
            'ciudad' => 'Ciudad Victoria',
            'colonia' => 'Zona Centro, Calle Hidalgo',
            'codigo_p' => '09876',
            'seccion' => 'a',
            'capacidad' => 1500,
            'img' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}