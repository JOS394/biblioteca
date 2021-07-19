<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\User;
use Spatie\Permission\Models\Permission;

class usuario extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'editor']);
        $role = Role::create(['name' => 'espectador']);

         Permission::create(['name' => 'ver usuarios']);
         Permission::create(['name' => 'crear usuarios']);
         Permission::create(['name' => 'editar usuarios']);
         Permission::create(['name' => 'eliminar usuarios']);


         Permission::create(['name' => 'ver activos']);
         Permission::create(['name' => 'crear activos']);
         Permission::create(['name' => 'editar activos']);
         Permission::create(['name' => 'eliminar activos']);
         Permission::create(['name' => 'restaurar activos']);


         Permission::create(['name' => 'ver trashActivos']);
         Permission::create(['name' => 'ver trashRegistros']);
  
     

         Permission::create(['name' => 'ver categorias']);
         Permission::create(['name' => 'crear categorias']);
         Permission::create(['name' => 'editar categorias']);
         Permission::create(['name' => 'eliminar categorias']);
         
         Permission::create(['name' => 'ver permisos']);
         Permission::create(['name' => 'asignar permisos']);
         Permission::create(['name' => 'editar permisos']);
         Permission::create(['name' => 'quitar permisos']);

         Permission::create(['name' => 'ver registros']);
         Permission::create(['name' => 'eliminar registros']);
         Permission::create(['name' => 'restaurar registros']);

         Permission::create(['name' => 'ver massive']);
         Permission::create(['name' => 'run massive']);

        

       $admin = User::create([
            'username' => 'admin',
            'password' => '$2y$10$PAgMpZl9.dv3eEbugZqBu.ERTXR3CaRTNMG6X67ikebDACtou1OW2',
            'tipo_usuario' => '1',
            'nom_completo' => 'usuario de prueba',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $admin->assignRole('admin');

        $admin->givePermissionTo('ver usuarios');
        $admin->givePermissionTo('crear usuarios');
        $admin->givePermissionTo('editar usuarios');
        $admin->givePermissionTo('eliminar usuarios');

        $admin->givePermissionTo('ver activos');
        $admin->givePermissionTo('crear activos');
        $admin->givePermissionTo('editar activos');
        $admin->givePermissionTo('eliminar activos');
        $admin->givePermissionTo('restaurar activos');


        $admin->givePermissionTo('ver trashActivos');
        $admin->givePermissionTo('ver trashRegistros');
    
       
        
        $admin->givePermissionTo('ver categorias');
        $admin->givePermissionTo('crear categorias');
        $admin->givePermissionTo('editar categorias');
        $admin->givePermissionTo('eliminar categorias');


        $admin->givePermissionTo('ver permisos');
        $admin->givePermissionTo('asignar permisos');
        $admin->givePermissionTo('editar permisos');
        $admin->givePermissionTo('quitar permisos');

        $admin->givePermissionTo('ver registros');
        $admin->givePermissionTo('eliminar registros');
        $admin->givePermissionTo('restaurar registros');

        $admin->givePermissionTo('ver massive');
        $admin->givePermissionTo('run massive');
        

    }
    
}
