<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'telefono' => '1234567890',
                'direccion' => 'Calle Principal 123, Ciudad',
                'id_categoria' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'María López',
                'email' => 'maria.lopez@example.com',
                'telefono' => '0987654321',
                'direccion' => 'Avenida Secundaria 456, Ciudad',
                'id_categoria' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Carlos Gómez',
                'email' => 'carlos.gomez@example.com',
                'telefono' => '1122334455',
                'direccion' => 'Boulevard Industrial 789, Ciudad',
                'id_categoria' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
