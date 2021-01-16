<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProjectCard extends Component
{
    public $project = null, $link;

    protected $listeners = ['destroy' => 'destroyProject'];

    public function destroyProject()
    {
        // Destroy project folder from S3
        $status = Storage::disk('s3')->deleteDirectory(config('aws3.aws_prefix_project_folder').$this->project->id);

        if($status){
            // Delete Row from project image table
            $this->project->image()->delete();

            // Destroy project completely
            Project::destroy($this->project->id);
            
            // Message by toastr
            session()->flash('body',  __('projects.successMessageDeleted'));
            session()->flash('title', __('projects.success'));

            return redirect()->to(route('proyectos.index'));
        }

    }

    public function amout(Project $project) // se llama es mount
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project-card');
    }
}
