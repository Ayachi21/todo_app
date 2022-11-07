
@extends('Utilisateur.layout')
 
 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2> Tasks Manager </h2>
             </div>
             
         </div>
     </div>
     <div class="row mw-">
        <div>
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('utilisateur.index') }}" method="GET" role="search">
    
                        <div class="input-group">
                            
                                
                                <button class="btn btn-info mb-5" type="submit" title="Search tasks" style="font-size: 20px">
                                    <span class="fa fa-search" > search</span>
                                </button>
                            
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search your tasks" id="term">
                            <a href="{{ route('utilisateur.index') }}" class=" mt-1">
                                <span class="pull-right " style=" position: absolute; top: 1px; left: 260px;">
                                    <button class="btn btn-light pull-right " type="button" title="Refresh page" style="font-size: 20px">
                                        <span class="fa fa-refresh "> search</span>
                                    </button>
                                </span>
                                
                            </a>
                        </div>
                    </form>
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