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
        $this->call([
            RolesYPermisosSeeder::class,
            UserSeeder::class,
        ]);
        $this->call([
            CategoriaSeeder::class,
            AlmacenSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
            InventarioSeeder::class,
            ClienteSeeder::class,
        ]);
    }
}
