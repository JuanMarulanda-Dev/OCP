<?php

namespace App\Http\Livewire;

use App\Traits\SearchProjectContet;
use Livewire\Component;
use Illuminate\Support\Str;

class FormProjectFile extends Component
{
    use SearchProjectContet;
    
    public $project, $project_folder, $route_content="/";

    public function amout($project, $project_folder)
    {
        $this->project = $project;
        $this->project_folder = $project_folder;
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

    public function changePorjectFolder($path)
    {
        $this->project_folder = $path;
        $this->route_content = Str::substr($this->project_folder, Str::length(explode('/', $this->project_folder)[0]));
    }

    public function chooseIconForItem($item)
    {
        $icon = "fas fa-folder";

        if(Str::of($item)->endsWith(['.pdf', '.png'])){

            $nameFile = explode('.', $item);

            switch ($nameFile[count($nameFile) - 1]) {
                case 'pdf':

                        return "far fa-file-pdf";

                    break;
                case 'png':

                        return "far fa-image";

                    break;
            }

        }

        return $icon;
    }

    public function rollbackProjectFolder()
    {
        $folders = Str::of($this->project_folder)->explode('/');

        if(count($folders) > 1){

            if($folders[count($folders) - 2] == $folders[0]){
                $this->route_content = "/";
                $this->project_folder = $folders[0];
            }else{                
                $this->project_folder = Str::of($this->project_folder)->explode('/' . $folders[count($folders) - 1])[0];
                $this->route_content = Str::substr($this->project_folder, Str::length(explode('/', $this->project_folder)[0]));
            }

        }
        
    }

    public function isFolderOrFile($name)
    {
        if(Str::of($name)->endsWith(['.pdf', '.png'])){
            // Is File
            return 1;
        }else{
            // Is Folder
            return 0;
        }
    }

    public function render()
    {
        return view('livewire.form-project-file',[
            'project_content' => $this->search_project_content($this->project_folder)
        ]);
    }
}
