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
        // Roles
        if(\App\Models\User_rol::count() == 0){
            \App\Models\User_rol::factory()->create(["id" => 1,"rol" => "Administrador"]);
            \App\Models\User_rol::factory()->create(["id" => 2,"rol" => "Usuario"]);
        }
        
        // Users
        \App\Models\User::factory(3)->create();


        // Project Types
        if(\App\Models\ProjectType::count() == 0){
            \App\Models\ProjectType::factory()->create(['type' => 'Inversión']);
            \App\Models\ProjectType::factory()->create(['type' => 'Consultoria']);
        }

        // Project Statuses
        if(\App\Models\ProjectStatus::count() == 0){
            \App\Models\ProjectStatus::factory()->create(['status' => 'Iniciado']);
            \App\Models\ProjectStatus::factory()->create(['status' => 'En proceso']);
            \App\Models\ProjectStatus::factory()->create(['status' => 'Finalizado']);
        }

        // Projects
        \App\Models\Project::factory()->create();
    }
}
