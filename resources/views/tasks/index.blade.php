
@extends('tasks.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Tasks Manager </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('tasks.create')}}"> Create New task</a>
            </div>
        </div>
    </div>
    <div class="row mw-">
    <div>
            <div class="mx-auto pull-left">
    
    <form action="{{ route('tasks.index') }}" method="GET" role="search">
    
                        <div class="input-group">
                            
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search tasks" id="term" style="position :left ;  width :500px ; height: 50px;">
                            <span class="input-group-btn mr-5 mt-1 ">
                                <button class="btn btn-info mb-5" type="submit" title="Search tasks" style="font-size: 24px">
                                    <span class="fa fa-search">search</span>
                                </button>
                            </span>
                        </div>
                    </form>
</div>
<div class="mx-auto pull-right">
                        <a href="{{ route('tasks.index') }}" class=" mt-1">
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
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('tasks.show',$task->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('tasks.edit',$task->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $tasks ->links() !!}
      
@endsection