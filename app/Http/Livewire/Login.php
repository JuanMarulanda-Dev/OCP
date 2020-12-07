<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '', $password = '';

    protected $rules = [
        'email' => "required|email",
        'password' => "required",
    ];

    public function submit_login()
    {
        // $this->emit('ShowLoaderActionLogin');
        $this->validate();

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){

            return redirect(route('home'));

        }else{

            $this->emit('ShowAlertDangerUserNotFound', "Advertencia!", "No se encontró cuenta del usuario con el correo especificado.");
            // $this->emit('HiddeLoaderActionLogin');
        }

    }

    public function render()
    {
        return view('livewire.login');
    }
}
