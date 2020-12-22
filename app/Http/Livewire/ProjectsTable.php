<?php

namespace App\Http\Livewire;

use App\Traits\WithSearchProjects;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsTable extends Component
{
    use WithSearchProjects, WithPagination;

    public $filter_field= "";
    public $assignments;
    public $user;

    protected $paginationTheme = 'bootstrap';


    public function chooseProject($idProject)
    {

        if(Arr::exists($this->assignments, $idProject)){
            // Delete selection
            Arr::forget($this->assignments, $idProject);
        }else{
            // add selection
            Arr::set($this->assignments, strval($idProject), $this->user->id);
        }

    }

    public function saveProjectAssignments()
    {
        // Delete all relationship with all projects
        $res = true;
        if(isset($this->user->assignments[0])){
            $res = $this->user->assignments()->delete();
        }

        // Save assignments to user
        if($res){
            foreach ($this->assignments as $project_id => $user) {
                $this->user->assignments()->create([
                    'project_id' => $project_id
                ]);
            }
            
            //Emit event that show message action
            $this->emit('ShowActionFinishedSuccess', "El usuario fue registrado exitosamente.", "Exitoso!");
        }
    }

    public function render()
    {
        return view('livewire.projects-table', [
            'projects' => $this->search_project_by_all_fieldes()->paginate(10)
        ]);
    }
}
