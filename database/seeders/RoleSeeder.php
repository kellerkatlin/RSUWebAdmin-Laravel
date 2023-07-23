<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear el permiso

        // Crear el rol
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Bloger']);
        // Asignar el permiso al rol
/*
        Permission::create(['name' => 'admin.home','description'=>'Ver el dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=> 'admin.users.index','description'=>'Ver listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.users.edit','description'=>'Asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'reportevoluntario','description'=>'Ver listado de Voluntarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'creavoluntario','description'=>'Crear Voluntario'])->assignRole($role1);
        Permission::create(['name' => 'modificavoluntario','description'=>'Modificar Voluntario'])->assignRole($role1);
        Permission::create(['name' => 'borravoluntario','description'=>'Borrar Voluntario'])->assignRole($role1);
        Permission::create(['name' => 'activavoluntario','description'=>'Activar Voluntario'])->assignRole([$role1]);
        Permission::create(['name' => 'desactivavoluntario','description'=>'Desactivar Voluntario'])->assignRole([$role1]);
 */
    }
}
