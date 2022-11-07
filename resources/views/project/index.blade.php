
@extends('project.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> projects Manager </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('project.create')}}"> Create New project</a>
            </div>
        </div>
    </div>
    <div class="row mw-">
    <div>
            <div class="mx-auto pull-left">
                
                    <form action="{{ route('project.index') }}" method="GET" role="search">
    
                        <div class="input-group">
                            
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term" style="position :left ;  width :500px ; height: 50px;">
                            <span class="input-group-btn mr-5 mt-1 ">
                                <button class="btn btn-info mb-5" type="submit" title="Search projects" style="font-size: 24px">
                                    <span class="fa fa-search"> search</span>
                                </button>
                            </span>
                            
                        </div>
                    </form>
                </div>
                <div class="mx-auto pull-right">
                        <a href="{{ route('project.index') }}" class=" mt-1">
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
            <th>project</th>
            
            <th>Details</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $project->name }}</td>
          
            <td>{{ $project->detail }}</td>
            
            <td>
                <form action="{{ route('project.destroy',$project->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('project.show',$project->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('project.edit',$project->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
    
@endsection