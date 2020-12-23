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
    
    public $project, $file, $project_folder, $route_content="/";

    protected $listeners = ['destroyPath', 'createNewProjcetFolder'];
    public $extensions = ['.pdf', '.png', '.jpg', '.xlsx', '.docx', '.txt'];

    public function mount($project, $project_folder) // se llama es mount
    {
        $this->project = $project;
        $this->project_folder = $project_folder;
    }

    public function uploadNewItem()
    {
        // Validar el tamaño de la imagen, que no sea mayor a 5 MB
        return $this->file->store($this->project_folder, 's3');
    }

    public function createNewProjcetFolder($nameNewFolder)
    {
        Storage::disk("s3")->makeDirectory($this->project_folder."/".$nameNewFolder);
        $this->emitTo('project-modal-create-new-folder', 'cleanField');
        $this->emit('ShowActionFinishedSuccess', 'La carpeta fue creada.', 'Exitoso!');
        $this->emit('HiddeCreateNewFolderModal');
    }

    public function changePorjectFolder($path)
    {
        $this->project_folder = $path;
        $this->route_content = Str::substr($this->project_folder, Str::length(explode('/', $this->project_folder)[0]));
    }

    public function chooseIconForItem($item)
    {
        $icon = "fas fa-folder";

        if(Str::of($item)->endsWith($this->extensions)){

            $nameFile = explode('.', $item);

            switch ($nameFile[count($nameFile) - 1]) {
                case 'pdf':
                        return "far fa-file-pdf";

                    break;
                case 'docx':

                        return "far fa-file-word";

                    break;
                case 'xlsx':

                        return "far fa-file-excel";

                    break;
                case 'txt':

                        return "far fa-file-alt";

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
        if(Str::of($name)->endsWith($this->extensions)){
            // Is File
            return 1;
        }else{
            // Is Folder
            return 0;
        }
    }

    public function destroyPath($pathToDelete)
    {
        if($this->isFolderOrFile($pathToDelete) == 0){
            // Eliminar Folder
            Storage::disk("s3")->deleteDirectory($pathToDelete);
        }else{
            //Eliminar File
            Storage::disk("s3")->delete($pathToDelete);
        }

        $this->emit('ShowActionFinishedSuccess', 'El archivo fue eliminado.', 'Exitoso!');
        
    }

    public function downloadFile($pathToDownload)
    {
        return Storage::disk('s3')->download($pathToDownload);
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
