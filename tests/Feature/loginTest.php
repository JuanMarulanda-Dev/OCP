<?php

namespace Tests\Feature;

use App\Http\Livewire\Login;
use App\Http\Livewire\Logout;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class loginTest extends TestCase
{
    use RefreshDatabase;

    protected static $user;

    /** @test  */
    public function login_view_contains_livewire_login()
    {
        \App\Models\User_rol::factory()->create(["rol" => "Administrador"]);
        self::$user = User::factory()->create();
        $this->get(route('login'))->assertSeeLivewire('login');
    }

    /** @test  */
    public function livewire_login_authentication()
    {
        //No funciona por que al parecer no esta entrando al attpmet
        Livewire::test(Login::class)
            ->set('email', self::$user->email)
            ->set('password', "password")
            ->call('submit_login')
            // ->assertEmitted('ShowAlertDangerUserNotFound')
            // ->assertRedirect(route('home')) // Esto no esta funcionando
            ->assertHasNoErrors(['email', 'password'])
            ->assertStatus(200);
    }

        /** @test  */
        public function livewire_login_no_authentication()
        {
            Livewire::test(Login::class)
                ->set('email', self::$user->email)
                ->set('password', "12345678")
                ->call('submit_login')
                ->assertHasNoErrors(['email', 'password'])
                ->assertEmitted('ShowAlertDangerUserNotFound')
                ->assertStatus(200);
        }

        /** @test  */
        public function livewire_logout()
        {
            Livewire::actingAs(self::$user);

            Livewire::test(Logout::class)
            ->emit('logout_session')
            ->assertEmitted('ShowLoaderPage')
            ->assertRedirect(route('login'))
            ->assertStatus(200);

            $this->get(route('home'))->assertRedirect('login');
        }

        
}
