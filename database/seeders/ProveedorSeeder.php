<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proveedores')->insert([
            [
                'nombre' => 'Proveedor 1',
                'telefono' => '1234567890',
                'direccion' => 'Calle Falsa 123, Ciudad',
                'email' => 'proveedor1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Proveedor 2',
                'telefono' => '0987654321',
                'direccion' => 'Avenida Siempre Viva 742, Ciudad',
                'email' => 'proveedor2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
