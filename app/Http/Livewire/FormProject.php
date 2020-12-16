<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormProject extends Component
{
    public $action = "submit_project_create";

    public $project, $name, $first_date, $last_date, $project_type, $status, $progress, $description, $image;

    protected $rules = [
        'name' => 'required|string|max:100',
        'first_date' => 'required|date',
        'last_date' => 'required|date',
        'project_type' => 'required',
        'status' => 'required|numeric',
        'progress' => "required|email|unique:users,email,",
        'description' => 'required|min:8'
    ];


    public function render()
    {
        return view('livewire.form-project');
    }
}
