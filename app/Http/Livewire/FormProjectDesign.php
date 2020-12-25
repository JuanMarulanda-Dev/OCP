<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormProjectDesign extends Component
{

    public $templates, $content_types;


    public function render()
    {
        return view('livewire.form-project-design');
    }
}
