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
    
                $this->emit('ShowAlertDangerUserNotFound', __('login.warning'), __('login.incorrectPassword'));
            }
        }else{
            
            $this->emit('ShowAlertDangerUserNotFound', __('login.warning'), __('login.dontFoundUser'));
        }

    }

    public function render()
    {
        return view('livewire.login');
    }
}
