<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        User::create(['name' => 'Administrador','email' => 'admin@admin.com','password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        User::create(['name' => 'AlexArregui','email' => 'alex.arregui@sumaempresa.com','password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        User::create(['name' => 'Gestion', 'email' => 'gestion@openprint.com','password'=>bcrypt('12345678'),
        ])->assignRole('Gestion');

        User::create(['name' => 'Cliente','email' => 'cliente@cliente.com','password' => bcrypt('12345678'),
        ])->assignRole('Cliente');

        User::create(['name' => 'montador','email' => 'montador@montador.com','password' => bcrypt('12345678'),
        ])->assignRole('Montador');

        User::create(['name' => 'tienda','email' => 'tienda@tienda.com','password' => bcrypt('12345678'),
        ])->assignRole('Tienda');
    }
}
