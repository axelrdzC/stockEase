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
                'ubicacion' => 'Av. Principal 123, Ciudad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Almacén Secundario',
                'ubicacion' => 'Calle Secundaria 456, Ciudad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
