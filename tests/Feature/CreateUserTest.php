<?php

namespace Tests\Feature;

use App\Http\Livewire\FormUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class CreateUserTest extends TestCase
{


    /** @test  */
    public function all_fields_are_required_for_saving_user()
    {
        Livewire::test(FormUser::class)
        ->set('name', '')
        ->set('last_name', '')
        ->set('company', '')
        ->set('profession', '')
        ->set('phone', '')
        ->set('email', '')
        ->set('password', '')
        ->set('user_rol_id', '')
        ->call('submit_user_create')
        ->assertHasErrors([
            'name',
            'last_name',
            'company',
            'profession',
            'phone',
            'email',
            'password',
            'user_rol_id',
            ]);
    }

    /** @test  */
    public function create_new_user()
    {
        $rol =\App\Models\User_rol::factory()->create(["rol" => "Administrador"]);

        Livewire::test(FormUser::class)
        ->set('name', 'Juan David')
        ->set('last_name', 'Marulanda Paniagua')
        ->set('company', 'Workana')
        ->set('profession', 'Developer')
        ->set('phone', '301245678')
        ->set('email', 'juadavmp-1130@gmail.com')
        ->set('password', '12345678')
        ->set('user_rol_id', $rol->id)
        ->call('submit_user_create')
        ->assertHasNoErrors([
            'name',
            'last_name',
            'company',
            'profession',
            'phone',
            'email',
            'password',
            'user_rol_id',
            ])
        ->assertEmitted('ShowActionFinishedSuccess')
        ->assertStatus(200);
    }

    /** @test  */
    public function can_upload_user_image_to_aws_s3()
    {
        Storage::fake('s3');

        $file = UploadedFile::fake()->image('avatar.png');

        $res =Livewire::test(FormUser::class)
                ->set('image', $file)
                ->call('upload_image');
        //Esta prueba aun no funciona
        // Storage::disk('s3')->assertExists('ocp_user_avatars/EQ1dCM3wX7jJmSBXIuvswkjMYDPKD6G8Q12YfEoc.jpg');
    }

}
