<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesYPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {


        # roles y asi

        $roleSuperAdmin = Role::firstOrCreate([
            'name' => 'super-admin',
        ]);

        $roleAdmin = Role::firstOrCreate([
            'name' => 'admin',
        ]);

        $roleEmpleado = Role::firstOrCreate([
            'name' => 'empleado',
        ]);


        # permisos y asi

        # sobre los productos
        Permission::firstOrCreate([ 'name' => 'crear productos', ]);

        Permission::firstOrCreate([ 'name' => 'editar productos', ]);

        Permission::firstOrCreate([ 'name' => 'ver productos', ]);

        Permission::firstOrCreate([ 'name' => 'eliminar productos', ]);

        # sobre los almacenes
        Permission::firstOrCreate([ 'name' => 'crear almacenes', ]);

        Permission::firstOrCreate([ 'name' => 'editar almacenes', ]);

        Permission::firstOrCreate([ 'name' => 'ver almacenes', ]);

        Permission::firstOrCreate([ 'name' => 'eliminar almacenes', ]);

        # sobre los proveedores
        Permission::firstOrCreate([ 'name' => 'crear proveedores', ]);

        Permission::firstOrCreate([ 'name' => 'editar proveedores', ]);

        Permission::firstOrCreate([ 'name' => 'ver proveedores', ]);

        Permission::firstOrCreate([ 'name' => 'eliminar proveedores', ]);

        # sobre los clientes
        Permission::firstOrCreate([ 'name' => 'crear clientes', ]);

        Permission::firstOrCreate([ 'name' => 'editar clientes', ]);

        Permission::firstOrCreate([ 'name' => 'ver clientes', ]);

        Permission::firstOrCreate([ 'name' => 'eliminar clientes', ]);

        #sobre las ordenes
        Permission::firstOrCreate([ 'name' => 'editar ordenes', ]);

        # give permisos
        $roleSuperAdmin->givePermissionTo([
            'crear productos',
            'editar productos',
            'ver productos',
            'eliminar productos',

            'crear almacenes',
            'editar almacenes',
            'ver almacenes',
            'eliminar almacenes',

            'crear proveedores',
            'editar proveedores',
            'ver proveedores',
            'eliminar proveedores',

            'crear clientes',
            'editar clientes',
            'ver clientes',
            'eliminar clientes',

            'editar ordenes',
        ]);

        $roleAdmin->givePermissionTo([
            'crear productos',
            'editar productos',
            'ver productos',
            'eliminar productos',

            'crear almacenes',
            'editar almacenes',
            'ver almacenes',
            'eliminar almacenes',

            'crear proveedores',
            'editar proveedores',
            'ver proveedores',
            'eliminar proveedores',

            'crear clientes',
            'editar clientes',
            'ver clientes',
            'eliminar clientes',

            'editar ordenes',
        ]);

        $roleEmpleado->givePermissionTo([
            'crear productos',
            'editar productos',
            'ver productos',
            'eliminar productos',

            'ver almacenes',

            'ver proveedores',

            'ver clientes',
        ]);

    }
}
