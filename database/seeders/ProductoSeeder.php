<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Laptop',
                'descripcion' => 'Laptop de alta gama para trabajo y juegos',
                'SKU' => 'LAP123',
                'unidad_medida' => 1.00,
                'precio' => 1500.00,
                'cantidad_producto' => 10,
                'almacen_id' => 1, 
                'proveedor_id' => 1, 
                'categoria_id' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Mouse Inalámbrico',
                'descripcion' => 'Mouse inalámbrico ergonómico',
                'SKU' => 'MOU456',
                'unidad_medida' => 0.50,
                'precio' => 20.00,
                'cantidad_producto' => 50,
                'almacen_id' => 1, 
                'proveedor_id' => 2, 
                'categoria_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Teclado Mecánico',
                'descripcion' => 'Teclado mecánico retroiluminado',
                'SKU' => 'TEC789',
                'unidad_medida' => 1.00,
                'precio' => 70.00,
                'cantidad_producto' => 30,
                'almacen_id' => 2, 
                'proveedor_id' => 1,
                'categoria_id' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
