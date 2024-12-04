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
                'pais' => 'México',
                'estado' => 'Nuevo León',
                'ciudad' => 'Monterrey',
                'colonia' => 'Zona Centro, Calle Hidalgo',
                'codigo_p' => '64000',
                'capacidad' => 2000,
                'img' => null,
            ],
            [
                'nombre' => 'Zona Sur',
                'pais' => 'México',
                'estado' => 'Nuevo León',
                'ciudad' => 'Guadalupe',
                'colonia' => 'Colonia Las Fuentes',
                'codigo_p' => '67170',
                'capacidad' => 1500,
                'img' => null,
            ],
            [
                'nombre' => 'Zona Este',
                'pais' => 'México',
                'estado' => 'Nuevo León',
                'ciudad' => 'San Nicolás',
                'colonia' => 'Residencial Los Robles',
                'codigo_p' => '66400',
                'capacidad' => 1800,
                'img' => null,
            ],
            [
                'nombre' => 'Zona Oeste',
                'pais' => 'México',
                'estado' => 'Nuevo León',
                'ciudad' => 'Apodaca',
                'colonia' => 'Valle de Huinalá',
                'codigo_p' => '66648',
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
