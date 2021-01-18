<?php

namespace App\Http\Livewire;

use App\Traits\SearchProjectContet;
use Livewire\Component;

class ProjectCoverPage extends Component
{
    use SearchProjectContet;
    
    public $project_folder;
    
    public function mount($project_folder)
    {
        $this->project_folder = $project_folder."/cover_page";
    }

    public function render()
    {
        
        $images = $this->search_project_content($this->project_folder, 0);

        return view('livewire.project-cover-page', [
            'images' => $images
        ]);
    }
}
