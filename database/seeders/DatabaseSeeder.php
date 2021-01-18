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
            \App\Models\User_rol::factory()->create(["id" => 1,"rol" => "Admin"]);
            \App\Models\User_rol::factory()->create(["id" => 2,"rol" => "User"]);
        }
        
        // Users
        // \App\Models\User::factory(3)->create();
        
        // Admin
        \App\Models\User::factory()->create([
            'email' => 'admin@mimsistemas.com',
        ]);


        // Project Types
        if(\App\Models\ProjectType::count() == 0){
            \App\Models\ProjectType::factory()->create(['type' => 'Investment']);
            \App\Models\ProjectType::factory()->create(['type' => 'consultancy']);
        }

        // Project Statuses
        if(\App\Models\ProjectStatus::count() == 0){
            \App\Models\ProjectStatus::factory()->create(['status' => 'Started']);
            \App\Models\ProjectStatus::factory()->create(['status' => 'Processing']);
            \App\Models\ProjectStatus::factory()->create(['status' => 'Finalized']);
        }

        // Projects
        \App\Models\Project::factory()->create();
        
    }
}
