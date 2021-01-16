<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormUser extends Component
{
    use WithFileUploads;

    public $action = "submit_user_create";

    public $user, $profile, $name, $last_name, $company, $profession, $phone, $email, $password, $user_rol_id , $image, $folder_img;

    protected $rules = [
        'name' => 'required|string',
        'last_name' => 'required|string',
        'company' => 'required|string',
        'profession' => 'required|string',
        'phone' => 'required|numeric',
        'email' => "required|email|unique:users,email,",
        'password' => 'required|min:8',
        'user_rol_id' => 'required|min:1|exists:App\Models\User_rol,id'
    ];

    private function chooseRulesForUpdateUser($id)
    {
        //unique:table,column,except,idColumn
        $this->rules['email']= "required|email|unique:users,email,".$id;

        //If have password then add password's rules
        if($this->password){
            $this->rules['password']= "required|min:8";
        }else{
            $this->rules['password']= "";
        }
    }

    public function mount($user = null, $profile = null)
    {
        if(isset($user)){
            $this->action = "submit_user_update";
            $this->name = $user->name;
            if(isset($user->image)){
                $this->image = $user->image->image;
            }
            $this->last_name = $user->last_name;
            $this->company = $user->company;
            $this->profession = $user->profession;
            $this->phone = $user->phone;
            $this->email = $user->email;
            $this->user_rol_id = $user->user_rol_id;
        }
        $this->folder_img = config('aws3.aws_folder_img');
        $this->profile = $profile;
        $this->user = $user;
    }

    public function submit_user_create()
    {
        //Validate User's Fields
        $validatedData = $this->validate();

        $this->validate([
            'image' => 'file|nullable|max:5024'
        ]);

        //Encrypt Password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Save new User
        $user = User::create($validatedData);

        if(isset($user)){

            // Upload Image
            if(isset($this->image)){

                $image_path = $this->upload_image();

                //Save image route
                $user->image()->save(Image::factory()->make([
                    'image' => $image_path
                ]));

            }
            //Emit event that show message action
            $this->emit('ShowActionFinishedSuccess', __('projects.successMessageCreated'), __('users.success'));
        }

    }

    public function submit_user_update()
    {

        $this->chooseRulesForUpdateUser($this->user->id);

        //Validate User's Fields to Update
        $validatedData = $this->validate($this->rules);

        // Validate image
        $this->validate([
            'image' => 'file|nullable|max:5024'
        ]);

        $data_user = [
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
            'company' => $validatedData['company'],
            'profession' => $validatedData['profession'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'user_rol_id' => $validatedData['user_rol_id']
        ];

        //Does have password change;
        if($this->password){
            $data_user['password'] = $validatedData['password'];
        }

        //Update User
        $this->user->update($data_user);

        // Upload Image
        if(isset($this->image)){

            // Does User Have one profile image
            if(isset($this->user->image)){

                $s3 = Storage::disk('s3');
                // Validate if exists image on s3
                if($s3->exists($this->user->image->image)){

                    //Delete image from s3 disk
                    $s3->delete($this->user->image->image);

                }

            }
            
            $image_path = $this->upload_image();

            //Save change image
            if(isset($this->user->image)){

                //Update Image route
                $this->user->image->update([
                    'image' => $image_path
                ]);
                
            }else{

                //Save Image Route
                $this->user->image()->save(Image::factory()->make([
                    'image' => $image_path
                ]));

            }

        }

        //Emit event that show message action
        $this->emit('ShowActionFinishedSuccess', __('users.successMessageUpdated'), __('users.success'));
    }

    public function upload_image()
    {
        return $this->image->store($this->folder_img, 's3');
    }

    public function cleanAllFields()
    {
        $this->image = null;
        $this->name = null;
        $this->last_name = null;
        $this->company = null;
        $this->profession = null;
        $this->phone = null;
        $this->email = null;
        $this->password = null;
        $this->user_rol_id = null;

    }

    public function render()
    {
        $roles = \App\Models\User_rol::all();
        return view('livewire.form-user',[
            'roles' => $roles
        ]);
    }
}
