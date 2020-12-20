<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormProjectFile extends Component
{

    public $project, $project_content, $route_content="/";

    public function amout($project, $project_content)
    {
        $this->project = $project;
        $this->project_content = $project_content;
    }

    public function uploadNewItem($directory)
    {
        # code...
    }

    public function createNewProjcetFolder()
    {
        # code...
    }

    public function nameProjectItem($item)
    {
        
    }

    public function render()
    {
        return view('livewire.form-project-file',[
            'project_content' => $this->project_content
        ]);
    }
}
