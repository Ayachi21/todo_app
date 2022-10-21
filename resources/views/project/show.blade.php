
@extends('project.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('project.index')}}"> Back</a>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center align-items-center">
    <div class="row ">
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $projects->name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $projects->detail }}
            </div>
        </div>
       
       
    </div>
   
    </div>
@endsection