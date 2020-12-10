<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if(\App\Models\User_rol::count() == 0){
            \App\Models\User_rol::factory()->create(["rol" => "Administrador"]);
            \App\Models\User_rol::factory()->create(["rol" => "Usuario"]);
        }
        
        \App\Models\User::factory()->create();
    }
}
