
@extends('Utilisateur.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('Utilisateur.index')}}"> Back</a>
            </div>
        </div>
    </div>
    <div  class="d-flex justify-content-center align-items-center">
    <div class="row">
    
    <div  class="d-flex justify-content-center align-items-center">
            <div class="form-group" >
                <strong>Name :</strong>
                {{ $task->user->name }}
            </div>
        </div>
        <div  class="d-flex justify-content-center align-items-center">
            <div class="form-group" >
                <strong>project name :</strong>
                {{ $task->project->name }}
            </div>
        </div>
       
        <div  class="d-flex justify-content-center align-items-center">
            <div class="form-group">
                <strong>Name task:</strong>
                {{ $task->name }}
            </div>
        </div>
        <div  class="d-flex justify-content-center align-items-center">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $task->detail }}
            </div>
        </div>
        <div  class="d-flex justify-content-center align-items-center">
            <div class="form-group">
                <strong>status:</strong>
                {{ $task->status }}
            </div>
        </div>
        <div  class="d-flex justify-content-center align-items-center">
            <div class="form-group">
                <strong>deadline:</strong>
                {{ $task->deadline }}
            </div>
        </div>
        
    </div> 
    </div>    
@endsection