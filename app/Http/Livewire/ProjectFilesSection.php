<?php

namespace App\Http\Livewire;

use App\Traits\SearchProjectContet;
use App\Traits\SelectIconFile;
use Livewire\Component;

class ProjectFilesSection extends Component
{
    use SearchProjectContet, SelectIconFile;

    public $project_folder;
    
    public function mount($project_folder)
    {
        $this->project_folder = $project_folder;
    }

    public function render()
    {

        $files = array_slice($this->search_project_content($this->project_folder), 0, 4);

        return view('livewire.project-files-section', [
            'porject_files' => $files
        ]);
    }
}
