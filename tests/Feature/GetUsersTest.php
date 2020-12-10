<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class GetUsersTest extends TestCase
{
    use RefreshDatabase;

    protected static $user;

    /** @test */
    public function user_index_view_contains_livewire_index_user_without_authentication()
    {
        $this->get(route('usuarios.index'))->assertStatus(302);
    }

    /** @test */
    public function user_index_view_contains_livewire_index_user()
    {
        //Login user
        \App\Models\User_rol::factory()->create(["id" => 1 ,"rol" => "Administrador"]);
        self::$user = \App\Models\User::factory()->create();
        Livewire::actingAs(self::$user);

        // Solo puede ingresar los usuarios que son administradores
        $this->get(route('usuarios.index'))
                    ->assertSeeLivewire('index-user')
                    ->assertStatus(200);
    }


}
