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
        $this->emit('reloadDataTableUsers', $this->userId);
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.index-user', [
            'users' => $users
        ]);
    }
}
