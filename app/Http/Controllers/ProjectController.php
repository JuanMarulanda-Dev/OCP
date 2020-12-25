<?php

namespace App\Http\Controllers;

use App\Models\Content_type;
use App\Models\Project;
use App\Models\Template;
use App\Traits\SearchProjectContet;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


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
        $templates = Template::all();
        $content_types = Content_type::all();

        return view("Modules/Projects/create", [
            'templates' => $templates,
            'content_types' => $content_types,
        ]);
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
        
        $templates = Template::all();
        $content_types = Content_type::all();

        return view("Modules/Projects/edit", [ 
            'project' => $project,
            'templates' => $templates,
            'content_types' => $content_types,
            ]);
        }

}
