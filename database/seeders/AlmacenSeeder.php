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
<<<<<<< HEAD
        DB::table('almacenes')->insert([
            [
                'nombre' => 'Almacén Central',
                'pais' => 'México',
                'estado' => 'Tamaulipas',
                'ciudad' => 'Ciudad Victoria',
                'colonia' => 'La Moderna, Calle Venezuela',
                'codigo_p' => '12345',
                'seccion' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Almacén Secundario',
                'pais' => 'México',
                'estado' => 'Nuevo León',
                'ciudad' => 'Tampico',
                'colonia' => 'Zona Centro, Calle Hidalgo',
                'codigo_p' => '09876',
                'seccion' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
=======
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
>>>>>>> main
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
