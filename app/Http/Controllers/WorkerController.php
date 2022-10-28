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
     * Display the specified resource.
     *
     *
     * @param  AppModelsTask  $task
     * @return IlluminateHttpResponse
     */
    public function show(Task $task, User $user, Project $project)
    {
       
        return view('Utilisateur.show',compact('user','project','task'));
    }

    
   

   
}
