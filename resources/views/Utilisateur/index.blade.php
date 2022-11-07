
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
            <div class="mx-auto pull-left">
                
                    <form action="{{ route('utilisateur.index') }}" method="GET" role="search">
    
                        <div class="input-group">
                            
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search your tasks" id="term" style="position :left ;  width :500px ; height: 50px;">
                            <span class="input-group-btn mr-5 mt-1 ">
                                <button class="btn btn-info mb-5" type="submit" title="Search your tasks" style="font-size: 20px">
                                    <span class="fa fa-search"> search</span>
                                </button>
                            </span>
                           
                        </div>
                        
                    </form>
                    
                </div>
                <div class="mx-auto pull-right">
                        <a href="{{ route('utilisateur.index') }}" class=" mt-1">
                                <span class="pull-right " >
                                    <button class="btn btn-info mb-5 pull-right " type="button" title="Refresh page" style="font-size: 20px">
                                        <span class="fa fa-refresh "> refresh</span>
                                    </button>
                                </span>
                                
                            </a>
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