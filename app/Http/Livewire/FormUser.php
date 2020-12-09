<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormUser extends Component
{
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
        'image' => 'file|nullable|size:1024',
    ];

    public function submit_user_create()
    {
        $validatedData = $this->validate();

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        if(isset($user)){
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
