<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectModalCreateNewFolder extends Component
{
    public $nameNewFolder;

    protected $listeners = ['createNewFolder', 'cleanField'];

    public function createNewFolder()
    {
        $this->emitTo('form-project-file', 'createNewProjcetFolder', $this->nameNewFolder);
    }

    public function cleanField()
    {
        $this->nameNewFolder = "";
    }

    public function render()
    {
        return view('livewire.project-modal-create-new-folder');
    }
}
