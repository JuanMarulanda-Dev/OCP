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
            \App\Models\User_rol::factory()->create(["id" => 1,"rol" => "Administrador"]);
            \App\Models\User_rol::factory()->create(["id" => 2,"rol" => "Usuario"]);
        }
        
        \App\Models\User::factory(3)->create();
    }
}
