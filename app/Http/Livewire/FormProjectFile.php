<?php

namespace App\Http\Livewire;

use App\Traits\SearchProjectContet;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class FormProjectFile extends Component
{
    use SearchProjectContet, WithFileUploads;
    
    public $project, $file, $project_folder, $route_content="/", $pathToDelete = "";

    protected $listeners = ['destroyPath', 'createNewProjcetFolder'];

    public function amout($project, $project_folder)
    {
        $this->project = $project;
        $this->project_folder = $project_folder;
    }

    public function uploadNewItem()
    {
        return $this->file->store($this->project_folder, 's3');
    }

    public function createNewProjcetFolder($nameNewFolder)
    {
        Storage::disk("s3")->makeDirectory($this->project_folder."/".$nameNewFolder);
        $this->emitTo('project-modal-create-new-folder', 'cleanField');
        $this->emit('ShowActionFinishedSuccess', 'La carpeta fue creada.', 'Exitoso!');
        $this->emit('HiddeCreateNewFolderModal');
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

    public function confirDeleteItem($pathToDelete)
    {
        $this->pathToDelete = $pathToDelete;
        $this->emit('showConfirmActionDeletePath');
    }

    public function destroyPath()
    {
        if($this->isFolderOrFile($this->pathToDelete) == 0){
            // Eliminar Folder
            Storage::disk("s3")->deleteDirectory($this->pathToDelete);
        }else{
            //Eliminar File
            Storage::disk("s3")->delete($this->pathToDelete);
            // dd($this->pathToDelete);
        }
        
    }


    public function render()
    {
        if(isset($this->file)){
            $this->uploadNewItem();
            $this->emit('ShowActionFinishedSuccess', 'El archivo fue subido.', 'Exitoso!');
            $this->file = null;
        }

        return view('livewire.form-project-file',[
            'project_content' => $this->search_project_content($this->project_folder)
        ]);
    }
}
