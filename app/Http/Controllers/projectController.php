<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;


class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::latest()->paginate(5);
  
        return view('project.index',compact('project'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        project::create($request->all());
   
        return redirect()->route('project.index')
                        ->with('success','project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  AppModelsproject  $project
     * @return IlluminateHttpResponse
     */
    public function show(project $project)
    {
        return view('project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppModelsproject  $project
     * @return IlluminateHttpResponse
     */
    public function edit(project $project)
    {
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  AppModelsproject  $project
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, project $project)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $project->update($request->all());
  
        return redirect()->route('project.index')
                        ->with('success','project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AppModelsproject  $project
     * @return IlluminateHttpResponse
     */
    public function destroy(project $project)
    {
        $project->delete();
  
        return redirect()->route('project.index')
                        ->with('success','project deleted successfully');
    }
}
