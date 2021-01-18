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
            $description, 
            $image;

    protected $rules = [
        'name' => 'required|string|max:100',
        'first_date' => 'required|date',
        'last_date' => 'required|date',
        'project_type_id' => 'required|numeric|min:1|exists:project_types,id',
        'project_status_id' => 'required|numeric|min:1|exists:project_statuses,id',
        'progress' => "required|numeric|min:1|max:100",
        'description' => 'required|string'
    ];

    public function mount($project = null)
    {
        if(isset($project)){
            $this->action = "submit_project_update";
            $this->name = $project->name;
            if(isset($project->image)){
                $this->image = $project->image->image;
            }
            $this->first_date = $project->first_date;
            $this->last_date = $project->last_date;
            $this->project_type_id = $project->project_type_id;
            $this->project_status_id = $project->project_status_id;
            $this->progress = $project->progress;
            $this->description = $project->description;
        }
        $this->project = $project;
    }

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
            $ProjectDirectory = config('aws3.aws_prefix_project_folder').$project->id."/Fotos y videos";

            // Upload Image
            if(isset($this->image)){

                $image_path = $this->upload_image($ProjectDirectory);

                //Save image route
                $project->image()->save(Image::factory()->make([
                    'image' => $image_path
                ]));

            }
            
            // Message by toastr
            session()->flash('body', __('projects.successMessageCreated'));
            session()->flash('title',  __('projects.success'));

            return redirect()->to(route('proyectos.show', $project->encid));

        }

    }

    public function submit_project_update()
    {
        //Validate User's Fields
        $validatedData = $this->validate();

        if(gettype($this->image) === "object"){
            // Validate if the request has a image
            $this->validate([
                'image' => 'file|nullable|max:5024' // 5MB
            ]);
        }

        // Save new project
        $response = $this->project->update($validatedData);

        if(isset($this->project) && $response){

            //Project folder for save main image project
            $ProjectDirectory = config('aws3.aws_prefix_project_folder').$this->project->id."/Fotos y videos";

            // Upload Image
            if(isset($this->image) && gettype($this->image) === "object"){

                // Does project Have one profile image
                if(isset($this->project->image)){

                    $s3 = Storage::disk('s3');
                    // Validate if exists image on s3
                    if($s3->exists($this->project->image->image)){

                        //Delete image from s3 disk
                        $s3->delete($this->project->image->image);

                    }

                }

                $image_path = $this->upload_image($ProjectDirectory);

                //Save change image
                if(isset($this->project->image)){

                    //Update Image route
                    $this->project->image->update([
                        'image' => $image_path
                    ]);
                    
                }else{

                    //Save Image Route
                    $this->project->image()->save(Image::factory()->make([
                        'image' => $image_path
                    ]));

                }

            }
            
            // Message by toastr
            session()->flash('body', __('projects.successMessageUpdated'));
            session()->flash('title', __('projects.success'));

            return redirect()->to(route('proyectos.show', $this->project->encid));

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
            'types' => \App\Models\ProjectType::all(), //Traerlos del controller
            'statuses' => \App\Models\ProjectStatus::all() //Traerlos del controller
        ]);
    }
}
