<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectFilesSection extends Component
{
    public $porject_files = [];
    
    protected $listeners = ['setFiles' => 'buildFilesProjectSection'] ;

    public function buildFilesProjectSection($files = [])
    {
        dd('Hola mundo');
        $this->porject_files = $files;
    }

    public function render()
    {
        return view('livewire.project-files-section');
    }
}
