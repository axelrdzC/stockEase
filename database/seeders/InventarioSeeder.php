<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventario')->insert([
            [
                'cantidad_actual' => 100,
                'stock_min' => 20,
                'stock_max' => 200,
                'id_productos' => 1,
                'id_almacen' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cantidad_actual' => 50,
                'stock_min' => 10,
                'stock_max' => 150,
                'id_productos' => 2,
                'id_almacen' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cantidad_actual' => 30,
                'stock_min' => 5,
                'stock_max' => 100,
                'id_productos' => 3,
                'id_almacen' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
