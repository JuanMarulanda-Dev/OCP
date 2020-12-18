<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IndexProject extends Component
{
    public $filter_field= "";

    private $projects;


    public function mount()
    {
        $this->search_project_by_all_fieldes();
    }

    public function render()
    {
        return view('livewire.index-project', [
            'projects' => $this->projects
        ]);
    }

    // Esto quedo pendiente ya que no quiere funcionar...
    public function search_project_by_all_fieldes()
    {
        //if is admin you can see all projects
        if(Auth::user()->user_rol_id == 1){ // Is Admin

            if(isset($this->filter_field)){
                $this->projects = Project::where('name', 'LIKE', "%$this->filter_field%")->with('project_type','project_status')->paginate(10);

                // dd($this->projects);
            }else{
                $this->projects = Project::with('project_type','project_status')->paginate(10);
            }

        }else{
            //Is is user you only can see your own projects
            $this->projects = Project::with('project_type','project_status')->paginate(10);
        }

    }


}
