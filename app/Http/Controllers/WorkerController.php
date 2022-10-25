<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\project;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index(Request $request, Task $tasks)
    {
     
           
            $user = User::find(Auth::id()) ;
          
            $tasks = Task::latest()->paginate(5);
            
            
      
            return view('Utilisateur.index',compact('tasks','user'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     *
     * @param  AppModelsTask  $task
     * @return IlluminateHttpResponse
     */
    public function show(Task $task, User $user, Project $project)
    {
        $task = Task::find($task->id);
        $user = User::find(Auth::id()) ;
        $project = Project::find($project->id);
       
       
        return view('utilisateur.show',compact('user','project','task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
