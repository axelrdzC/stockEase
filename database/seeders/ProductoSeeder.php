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
                'categoria_id' => 1, 
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

            [
                'nombre' => 'Camisa de Algodón',
                'descripcion' => 'Camisa cómoda y casual de algodón',
                'SKU' => 'CAM101',
                'unidad_medida' => 1.00,
                'precio' => 25.00,
                'cantidad_producto' => 40,
                'almacen_id' => 2,
                'proveedor_id' => 3,
                'categoria_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pantalón Casual',
                'descripcion' => 'Pantalón moderno de corte ajustado',
                'SKU' => 'PAN102',
                'unidad_medida' => 1.00,
                'precio' => 40.00,
                'cantidad_producto' => 25,
                'almacen_id' => 2,
                'proveedor_id' => 4,
                'categoria_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Chaqueta de Cuero',
                'descripcion' => 'Chaqueta elegante y resistente',
                'SKU' => 'CHA103',
                'unidad_medida' => 1.00,
                'precio' => 100.00,
                'cantidad_producto' => 10,
                'almacen_id' => 3,
                'proveedor_id' => 3,
                'categoria_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nombre' => 'Set de Sartenes',
                'descripcion' => 'Set de sartenes antiadherentes para cocina',
                'SKU' => 'SAR202',
                'unidad_medida' => 1.00,
                'precio' => 50.00,
                'cantidad_producto' => 15,
                'almacen_id' => 3,
                'proveedor_id' => 4,
                'categoria_id' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tostadora',
                'descripcion' => 'Tostadora automática para dos rebanadas',
                'SKU' => 'TOS203',
                'unidad_medida' => 1.00,
                'precio' => 35.00,
                'cantidad_producto' => 20,
                'almacen_id' => 3,
                'proveedor_id' => 5,
                'categoria_id' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Horno Microondas',
                'descripcion' => 'Horno microondas con múltiples funciones',
                'SKU' => 'MIC204',
                'unidad_medida' => 1.00,
                'precio' => 120.00,
                'cantidad_producto' => 8,
                'almacen_id' => 1,
                'proveedor_id' => 5,
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
