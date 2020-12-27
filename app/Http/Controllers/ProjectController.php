<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\SearchProjectContet;

class ProjectController extends Controller
{
    use SearchProjectContet;
    
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view("Modules/Projects/index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view("Modules/Projects/create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::with('image')->find($id);

        if(isset($project)){
            $project_folder = config('aws3.aws_prefix_project_folder').$project->id;

            $content = $this->search_project_content($project_folder);
            
            return view("Modules/Projects/show", [ 
                'project' => $project,
                'project_folder' => $project_folder,
                'project_content' => $content]);
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $project = Project::find($id);

        if($project){
            return view("Modules/Projects/edit", [ 
                'project' => $project,
                ]);
        }

        abort(404);
    }

}
