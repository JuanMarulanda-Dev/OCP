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

    /** @test  */
    public function login_view_contains_livewire_login()
    {
        $this->get('/login')->assertSeeLivewire('login');
    }

    /** @test  */
    public function contains_livewire_login_authentication()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', "password")
            ->call('submit_login')
            ->assertHasNoErrors(['email', 'password'])
            ->assertRedirect('/home')
            ->assertStatus(200);
    }

        /** @test  */
        public function livewire_login_no_authentication()
        {
            $user = User::factory()->create();
    
            Livewire::test(Login::class)
                ->set('email', $user->email)
                ->set('password', "12345678")
                ->call('submit_login')
                ->assertHasNoErrors(['email', 'password'])
                ->assertEmitted('ShowAlertDangerUserNotFound')
                ->assertStatus(200);
        }

        /** @test  */
        public function livewire_logout()
        {
            $user = User::factory()->create();
            Livewire::actingAs($user);

            Livewire::test(Logout::class)
            ->emit('logout_session')
            ->assertEmitted('ShowLoaderPage')
            ->assertRedirect('/login')
            ->assertStatus(200);

            $this->get('/home')->assertRedirect('login');
        }

        
}
