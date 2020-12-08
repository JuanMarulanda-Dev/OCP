<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{

    protected $listeners = ['logout_session' => 'logout'];

    public function logout()
    {

        $this->emit('ShowLoaderPage');

        Auth::logout();

        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
