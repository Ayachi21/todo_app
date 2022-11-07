<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use Illuminate\Http\Request;


class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::where([
            ['name', '!=', null],
            [function ($query) use ($request) {
            if (($term = $request->term)) {
                $query->orWhere('name', 'LIKE', '%'. $term. '%')->get();
            }
            }]
        ])->orderBy("id", "desc")
          ->paginate(5);
        return view('project.index',compact('projects',))
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
    public function show( $id)
    {
        $projects = Project::findOrFail($id);
        
        return view('project.show',compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppModelsproject  $project
     * @return IlluminateHttpResponse
     */
    public function edit( $id)
    {
        
        $projects = Project::findOrFail($id);
        return view('project.edit',compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  AppModelsproject  $project
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, $id)
    {
        $upp=$request->validate([
            'name' => 'required',
            'detail' => 'required',
            
        ]);
        Project::whereId($id)->update($upp);
  
        return redirect()->route('project.index')
                        ->with('success','project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AppModelsproject  $project
     * @return IlluminateHttpResponse
     */
    public function destroy($id)
    {
        $projects = Project::findOrFail($id);
        $projects->delete();
  
        return redirect()->route('project.index')
                        ->with('success','project deleted successfully');
    }
}
