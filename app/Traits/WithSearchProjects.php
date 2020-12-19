<?php

namespace App\Traits;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

trait WithSearchProjects
{
        // Esto quedo pendiente ya que no quiere funcionar...
        public function search_project_by_all_fieldes()
        {
            //if is admin you can see all projects
            if(Auth::user()->user_rol_id == 1){ // Is Admin
    
                if(isset($this->filter_field)){
                    return Project::where('name', 'LIKE', "%$this->filter_field%")->with('project_type','project_status')->paginate(10);
    
                    // dd($this->projects);
                }else{
                    return Project::with('project_type','project_status')->paginate(10);
                }
    
            }else{
                //Is is user you only can see your own projects
                return Project::with('project_type','project_status')->paginate(10);
            }
    
        }

}