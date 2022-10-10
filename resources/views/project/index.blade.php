
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
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($project as $projects)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $projects->name }}</td>
            
            <td>{{ $projects->detail }}</td>
            <td>
                <form action="{{ route('project.destroy',$projects->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('project.show',$projects->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('project.edit',$projects->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $project->links() !!}
      
@endsection