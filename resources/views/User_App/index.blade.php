
@extends('tasks.layout')
 
 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2> Tasks Manager </h2>
             </div>
             
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <table class="table table-bordered">
         <tr>
             <th>No</th>
             <th>user</th>
             <th> project</th>
             <th> task</th>
             <th>Details</th>
             <td>Status</td>
           <td>Deadline</td>
             <th width="280px">Action</th>
         </tr>
         @foreach ($tasks as $task)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $task->user->name }}</td>
             <td>{{ $task->project->name }}</td>
             <td>{{ $task->name }}</td>
             <td>{{ $task->detail }}</td>
             <td>{{$task->status}}</td>
             <td>{{$task->deadline}}</td>
             <td>
               
    
                     <a class="btn btn-info" href="{{route('tasks.show',$task->id)}}">Show</a>
     
                   
    
                     @csrf
                    
                 
             </td>
         </tr>
         @endforeach
     </table>
   
     {!! $tasks ->links() !!}
       
 @endsection