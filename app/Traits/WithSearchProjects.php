<?php

namespace App\Traits;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait WithSearchProjects
{
        // Esto quedo pendiente ya que no quiere funcionar...
        public function search_project_by_all_fieldes()
        {
            //if is admin you can see all projects
            if(Auth::user()->user_rol_id == 1){ // Is Admin
    
                if(isset($this->filter_field)){

                    return Project::where('name', 'LIKE', "%$this->filter_field%")->with('project_type','project_status', 'image');
    
                }else{

                    return Project::with('project_type','project_status', 'image');

                }
    
            }else{

                //If is user you only can see your own projects
                if(isset($this->filter_field)){

                    return Auth::user()->projects()->where('name', 'LIKE', "%$this->filter_field%")->with('project_type','project_status', 'image');

                }else{
                    
                    return Auth::user()->projects()->with('project_type','project_status', 'image');

                }
                
            }
    
        }

}