<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('almacenes')->insert([
            [
                'nombre' => 'Almacén Central',
                'pais' => 'México',
                'estado' => 'Tamaulipas',
                'ciudad' => 'Ciudad Victoria',
                'colonia' => 'La Moderna, Calle Venezuela',
                'codigo_p' => '12345',
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
