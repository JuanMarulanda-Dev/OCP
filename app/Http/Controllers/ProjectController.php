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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Modules/Projects/index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $project_folder = config('aws3.aws_prefix_project_folder'). $project->id;

        $content = $this->search_project_content($project_folder);
        
        return view("Modules/Projects/show", [ 
            'project' => $project,
            'project_folder' => $project_folder,
            'project_content' => $content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
