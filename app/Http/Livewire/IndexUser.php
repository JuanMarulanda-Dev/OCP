<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUser extends Component
{
    use WithPagination;

    public $filter_field = "";
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroyConfirm', 'destroy'];

    public $userId;

    public function destroyConfirm($id)
    {
        $this->userId = $id;
        $this->emit('showConfirmActionDeleteUser');
    }

    public function destroy()
    {
        try {
            // Destroy User row
            $id = decrypt($this->userId);

            $user = User::find($id);

            // User does have one image
            if(isset($user->image)){
                
                $s3 = Storage::disk('s3');
                // Validate if exists image on s3
                if($s3->exists($user->image->image)){

                    //Delete image from s3 disk
                    $s3->delete($user->image->image);

                    // Delete Image's User
                    $user->image->delete();

                }

            }

            $res = $user->delete();

            if($res){
                $this->userId = 0;
                // Delete Images if have somethings 

                $this->emit('ShowActionFinishedSuccess', __('users.successMessageDeleted'), __('users.success'));
                $this->emit('HiddeDeleteConfirmationModal');
                
            }

        } catch (\Throwable $th) {
            //throw $th;
            $this->emit('ShowActionFinishedError', __('users.errorMessage'), __('users.error'));
        }

    }

    public function showUserDetalis($id)
    {
        return redirect()->to(route('usuarios.show', $id)); 
    }

    private function search_user_by_all_fieldes()
    {
        if(isset($this->filter_field)){

            return User::where('name', 'LIKE', "%$this->filter_field%")
                        ->orWhere('last_name', 'LIKE', "%$this->filter_field%")
                        ->orWhere('company', 'LIKE', "%$this->filter_field%")
                        ->orWhere('email', 'LIKE', "%$this->filter_field%")
                        ->with('image', 'user_rol');

        }else{

            return User::with('image', 'user_rol');

        }
    }

    public function render()
    {
        $users = $this->search_user_by_all_fieldes()->paginate(10);
        
        return view('livewire.index-user', [
            'users' => $users
        ]);
    }
}
