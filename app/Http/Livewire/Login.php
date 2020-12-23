<?php

namespace App\Http\Livewire;

use App\Models\User;
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
        $this->validate();
        
        if(User::where('email', $this->email)->first() != null){

            if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){

                return redirect(route('proyectos.index'));
    
            }else{
    
                $this->emit('ShowAlertDangerUserNotFound', "Advertencia!", "Contraseña incorrecta");
            }
        }else{
            
            $this->emit('ShowAlertDangerUserNotFound', "Advertencia!", "No se encontró cuenta del usuario con el correo especificado.");
        }

    }

    public function render()
    {
        return view('livewire.login');
    }
}
