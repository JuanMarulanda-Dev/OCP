<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view("Modules/Users/index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        
        return view("Modules/Users/create");
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
        return view("Modules/Users/show", [ 'user' => $user, 'assignments' => $user->assignments()->pluck("user_id", "project_id")->toArray()]);
    }

}
