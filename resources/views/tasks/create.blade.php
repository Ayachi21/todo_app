
@extends('tasks.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New task</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('tasks.index')}}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('tasks.store') }}" method="POST"  class="d-flex justify-content-center align-items-center">
    @csrf
  
     <div class="row">
     <div  class="d-flex justify-content-center align-items-center">
     <div class="form-group">
              <label for="cases" style="width: 400px">User :</label>
                <select name="user_id" class="form-control">
                    <option disabled selected value> -- select a user -- </option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id}}">{{ $user->name}}</option>
                    @endforeach
                </select>
          </div>
     </div>
          <div  class="d-flex justify-content-center align-items-center">
          <div class="form-group">
            <label for="cases" style="width: 400px">Project :</label>
            <select name="project_id" class="form-control">
                <option disabled selected value> -- select a project -- </option>
                @foreach ($projects as $project)
                <option value="{{ $project->id}}">{{ $project->name}}</option>
                @endforeach
            </select>
      </div>
          </div>
      <div  class="d-flex justify-content-center align-items-center">
            <div class="form-group" >
                <strong>Name task:</strong>
                <input type="text"  style="width: 400px" name="name" class="form-control" placeholder="Name_task">
            </div>
        </div>
        
        <div  class="d-flex justify-content-center align-items-center">
            <div class="form-group" >
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px ; width: 400px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        <div  class="d-flex justify-content-center align-items-center">
        <div class="form-group">
            <label for="cases" style="width: 400px">Status :</label>
            <select name="status" class="form-control" value="status">
                <option value="todo">To Do</option>
                <option value="doing">Doing</option>
                <option value="done">Done</option>
            </select>
        </div>
        </div>
        <div  class="d-flex justify-content-center align-items-center">
        <div class="form-group">
            <label for="cases" style="width: 400px">Deadline :</label>
            <input type="date" class="form-control" name="deadline"/>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection