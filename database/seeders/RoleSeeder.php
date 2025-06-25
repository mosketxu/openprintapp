<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        $role1=Role::create(['name'=>'Admin']);
        $role2=Role::create(['name'=>'Gestion']);
        $role3=Role::create(['name'=>'Operario']);
        $role4=Role::create(['name'=>'Comercial']);
        $role5=Role::create(['name'=>'Cliente']);
        $role6=Role::create(['name'=>'Tienda']);
        $role7=Role::create(['name'=>'Montador']);
    }
}
