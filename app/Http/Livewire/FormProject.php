<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormProject extends Component
{
    use WithFileUploads;

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

        // Validate if the request has a image
        $this->validate([
            'image' => 'file|nullable|max:5024' // 5MB
        ]);

        // Save new project
        $project = Project::create($validatedData);

        if(isset($project)){

            //Project folder for save main image project
            $ProjectDirectory = env('AWS_PREFIX_PROJECT_FOLDER').$project->id."/Fotos y videos";

            // Upload Image
            if(isset($this->image)){

                $image_path = $this->upload_image($ProjectDirectory);

                //Save image route
                $project->image()->save(Image::factory()->make([
                    'image' => $image_path
                ]));

            }
            
            // Message by toastr
            session()->flash('body', 'El proyecto fue creado exitosamente.');
            session()->flash('title', 'Exitoso!');

            return redirect()->to(route('proyectos.show', $project->id));

        }

    }

    public function upload_image($path)
    {
        return $this->image->store($path, 's3');
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
