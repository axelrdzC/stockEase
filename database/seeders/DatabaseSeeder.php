<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Manda llamar a los seeders individualmente
        $this->call([
            CategoriaSeeder::class,
            AlmacenSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
            InventarioSeeder::class,
            UserSeeder::class,
            ClienteSeeder::class,
        ]);
    }
}
