<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Project;
use Livewire\Component;

class FormProject extends Component
{
    public $action = "submit_project_create";

    public $project, 
            $name, 
            $first_date, 
            $last_date, 
            $project_type_id, 
            $project_status_id, 
            $progress, 
            $description, $image;

    protected $rules = [
        'name' => 'required|string|max:100',
        'first_date' => 'required|date',
        'last_date' => 'required|date',
        'project_type_id' => 'required|numeric|min:1|exists:project_types,id',
        'project_status_id' => 'required|numeric|min:1|exists:project_statuses,id',
        'progress' => "required|numeric|min:1|max:100",
        'description' => 'required|string'
    ];

    public function submit_project_create()
    {
        //Validate User's Fields
        $validatedData = $this->validate();

        $this->validate([
            'image' => 'file|nullable|max:5024' // 5MB
        ]);

        // Save new project
        $project = Project::create($validatedData);

        if(isset($project)){

            // Upload Image
            if(isset($this->image)){

                $image_path = $this->upload_image();

                //Save image route
                $project->image()->save(Image::factory()->make([
                    'image' => $image_path
                ]));

            }
            //Emit event that show message action
            $this->emit('ShowActionFinishedSuccess', "El proyecto fue registrado exitosamente.", "Exitoso!");
        }

    }

    public function cleanAllFields()
    {
        $this->image = null;
        $this->name = null;
        $this->first_date = null;
        $this->last_date = null;
        $this->project_type = null;
        $this->status = null;
        $this->progress = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.form-project', [
            'types' => \App\Models\ProjectType::all(),
            'statuses' => \App\Models\ProjectStatus::all()
        ]);
    }
}
