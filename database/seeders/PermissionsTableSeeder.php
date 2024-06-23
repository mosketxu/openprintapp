<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('permissions')->delete();

        $admin=Role::where('name','Admin')->first();
        $grafitex=Role::where('name','Grafitex')->first();
        $cliente=Role::where('name','Cliente')->first();
        $tienda=Role::where('name','Tienda')->first();
        $montador=Role::where('name','Montador')->first();

        // Users
        // Permission::create(['name'=>'user.index'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'user.create'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'user.edit'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'user.update'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'user.delete'])->syncRoles($admin, $grafitex);

        // // Roles
        // Permission::create(['name'=>'role.index'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'role.create'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'role.edit'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'role.update'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'role.delete'])->syncRoles($admin, $grafitex);

        // // Permisos
        // Permission::create(['name'=>'permiso.index'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'permiso.create'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'permiso.edit'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'permiso.update'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'permiso.delete'])->syncRoles($admin, $grafitex);


        // campaign
        Permission::create(['name'=>'campaign.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'campaign.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'campaign.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'campaign.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'campaign.delete'])->syncRoles($admin, $grafitex);

        // // campaign store
        // Permission::create(['name'=>'campaignstore.index'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignstore.create'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignstore.edit'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignstore.update'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignstore.delete'])->syncRoles($admin, $grafitex);

        // // campaign elemento
        // Permission::create(['name'=>'campaignelemento.index'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignelemento.create'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignelemento.edit'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignelemento.update'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignelemento.delete'])->syncRoles($admin, $grafitex);

        // // campaign store elemento
        // Permission::create(['name'=>'campaignstoreelemento.index'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignstoreelemento.create'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignstoreelemento.edit'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignstoreelemento.update'])->syncRoles($admin, $grafitex);
        // Permission::create(['name'=>'campaignstoreelemento.delete'])->syncRoles($admin, $grafitex);

    }
}
