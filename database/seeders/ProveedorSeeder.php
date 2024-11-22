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
                'email' => 'proveedor1@example.com',
                'telefono' => '1234567890',
                'direccion' => 'Calle Falsa 123, Ciudad',
                'id_categoria' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Proveedor 2',
                'email' => 'proveedor2@example.com',
                'telefono' => '0987654321',
                'direccion' => 'Avenida Siempre Viva 742, Ciudad',
                'id_categoria' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Proveedor 3',
                'email' => 'proveedor3@example.com',
                'telefono' => '1112223333',
                'direccion' => 'Calle Nueva 456, Ciudad',
                'id_categoria' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Proveedor 4',
                'email' => 'proveedor4@example.com',
                'telefono' => '4445556666',
                'direccion' => 'Boulevard Principal 789, Ciudad',
                'id_categoria' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Proveedor 5',
                'email' => 'proveedor5@example.com',
                'telefono' => '7778889999',
                'direccion' => 'Avenida Secundaria 101, Ciudad',
                'id_categoria' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
