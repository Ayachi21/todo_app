<?php

namespace App\Http\Controllers;
use App\Http\Controllers\projectController;
use App\Models\Task;
use App\Models\project;
use App\Models\user;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        $users = User::all();
        $projects = project::all();
        $tasks = Task::latest()->paginate(5);
        $users = User::latest()->paginate(5);
        $projects = project::latest()->paginate(5);
  
        return view('tasks.index',compact('tasks','users','projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $projects= Project::all();
        return view('tasks.create', ['users'=>$users], ['projects'=>$projects]);
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
            'project_id' => 'required',
            'user_id' => 'required',
            'detail' => 'required',
            'deadline'=> 'required',
            'status' => 'required',
        ]);
  
        Task::create($request->all());
   
        return redirect()->route('tasks.index')
                        ->with('success','Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  AppModelsTask  $task
     * @return IlluminateHttpResponse
     */
    public function show( $id)
    {
        $task = Task::findOrFail($id);
        $user = User::all();
        $user = User::findOrFail($id);
        $project= Project::all();
        $project = Project::findOrFail($id);
        
        
        return view('tasks.show',compact('task','project','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppModelsTask  $task
     * @return IlluminateHttpResponse
     */
    public function edit( $id)
    {    
        $task = Task::findOrFail($id);    
        $user = User::all();
        $project= Project::all();
        
        
        return view('tasks.edit',compact('task', 'user', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  AppModelsTask  $task
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, $id)
    {                       

        $upp= $request->validate([
            'name' => 'required',
            'project_id' => 'required',
            'user_id' => 'required',
            'detail' => 'required',
            'deadline'=> 'required',
            'status' => 'required',
        ]);
  
        Task::whereId($id)->update($upp);
  
        return redirect()->route('tasks.index')
                        ->with('success','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AppModelsTask  $task
     * @return IlluminateHttpResponse
     */
    public function destroy( $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
  
        return redirect()->route('tasks.index' ,compact('task'))
                        ->with('success','Task deleted successfully');
    }
}
