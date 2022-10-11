
@extends('user.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show user</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('tasks.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>Name:</h4>
                {{ $user->name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>Details:</h4>
                <br> <strong> email : </strong> {{ $user->email  }}  <br>
               <strong> role :  </strong> {{ $user->role  }} 
            </div>
        </div>
    </div>
@endsection