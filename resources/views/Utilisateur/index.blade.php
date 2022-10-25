
@extends('Utilisateur.layout')
 
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
         @foreach ($user->task as $tasks)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $tasks->user->name }}</td>
             <td>{{ $tasks->project->name }}</td>
             <td>{{ $tasks->name }}</td>
             <td>{{ $tasks->detail }}</td>
             <td>{{$tasks->status}}</td>
             <td>{{$tasks->deadline}}</td>
             <td>
               
    
                     <a class="btn btn-info" href="{{route('utilisateur.show',$tasks->id)}}">Show</a>
     
                   
    
                     @csrf
                    
                 
             </td>
         </tr>
         @endforeach
     </table>
   
    
       
 @endsection