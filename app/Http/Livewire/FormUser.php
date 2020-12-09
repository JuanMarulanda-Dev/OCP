<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormUser extends Component
{
    use WithFileUploads;

    public $name, $last_name, $company, $profession, $phone, $email, $password, $user_rol_id , $image;

    protected $rules = [
        'name' => 'required|string',
        'last_name' => 'required|string',
        'company' => 'required|string',
        'profession' => 'required|string',
        'phone' => 'required|numeric',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'user_rol_id' => 'required|min:1|exists:App\Models\User_rol,id',
        'image' => 'file|nullable|max:5024',
    ];

    public function submit_user_create()
    {
        $validatedData = $this->validate();

        $validatedData['password'] = Hash::make($validatedData['password']);

        unset($validatedData['image']);

        // Save User
        $user = User::create($validatedData);

        if(isset($user)){

            // Upload Image
            if(isset($this->image)){

                $image_path =  $this->image->store('ocp_user_avatars', 's3');

                //Save image
                $user->image()->save(Image::factory()->make([
                    'image' => $image_path
                ]));

            }

            $this->emit('ShowActionFinishedSuccess', "El usuario fue registrado exitosamente.", "Exitoso!");
        }

    }

    public function render()
    {
        $roles = \App\Models\User_rol::all();
        return view('livewire.form-user',[
            'roles' => $roles
        ]);
    }
}
