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
        $almacenes = [
            [
                'nombre' => 'Zona Norte',
                'ubicacion' => 'México, Nuevo León, Monterrey, Zona Centro, Calle Hidalgo, 64000',
                'capacidad' => 2000,
                'img' => null,
            ],
            [
                'nombre' => 'Zona Sur',
                'ubicacion' => 'México, Nuevo León, Guadalupe, Colonia Las Fuentes, 67170',
                'capacidad' => 1500,
                'img' => null,
            ],
            [
                'nombre' => 'Zona Este',
                'ubicacion' => 'México, Nuevo León, San Nicolás, Residencial Los Robles, 66400',
                'capacidad' => 1800,
                'img' => null,
            ],
            [
                'nombre' => 'Zona Oeste',
                'ubicacion' => 'México, Nuevo León, Monterrey, Zona Poniente, 64000',
                'capacidad' => 1700,
                'img' => null,
            ],
        ];

        foreach ($almacenes as $almacen) {
            Almacen::create(array_merge($almacen, [
                'img' => $almacen['img'] ?? '/storage/img/almacen.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
