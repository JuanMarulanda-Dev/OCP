<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class IndexUser extends Component
{

    private $userId;
    protected $listeners = ['destroyConfirm'];

    public function destroyConfirm($id)
    {
        $this->userId = $id;
        $this->emit('showConfirmActionDeleteUser');
    }

    public function destroy()
    {
        User::destroy($this->userId);
        $this->userId = 0;
        $this->emit('reloadDataTableUsers', $this->userId);
    }

    public function showUserDetalis($id)
    {
        return redirect()->to(route('usuarios.show', $id)); 
    }

    public function render()
    {
        $users = User::with('image', 'user_rol')->get();
        return view('livewire.index-user', [
            'users' => $users
        ]);
    }
}
