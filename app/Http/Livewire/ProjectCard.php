<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProjectCard extends Component
{
    public $project = null;

    protected $listeners = ['destroy' => 'destroyProject'];

    public function destroyProject()
    {
        // Destroy project folder from S3
        $status = Storage::disk('s3')->deleteDirectory(env('AWS_PREFIX_PROJECT_FOLDER').$this->project->id);

        if($status){
            // Delete Row from project image table
            $this->project->image()->delete();

            // Destroy project completely
            Project::destroy($this->project->id);
            
            // Message by toastr
            session()->flash('body', 'El proyecto fue eliminado exitosamente.');
            session()->flash('title', 'Exitoso!');

            return redirect()->to(route('proyectos.index'));
        }

    }

    public function amout(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project-card');
    }
}
