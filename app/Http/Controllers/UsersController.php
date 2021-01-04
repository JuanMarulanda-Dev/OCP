<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected $module = 'users';

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view("Modules/Users/index", ['module' => $this->module]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        
        return view("Modules/Users/create", ['module' => $this->module]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('image', 'user_rol')->first();
        if(isset($user)){
            return view("Modules/Users/show", [
                    'user' => $user, 
                    'assignments' => $user->assignments()->pluck("user_id", "project_id")->toArray(),
                    'module' => $this->module]);
        }else{
            abort(404);
        }
    }

}
