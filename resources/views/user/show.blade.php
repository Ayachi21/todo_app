
@extends('user.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show user</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('user.index')}}"> Back</a>
            </div>
        </div>
    </div>
    <div  class="d-flex justify-content-center align-items-center">
    <div class="row">
   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>Name:</h4>
                {{ $users-> name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>Details:</h4>
                <br> <strong> email : </strong> {{ $users->email  }}  <br>
               <strong> role :  </strong> {{ $users->role  }} 
            </div>
        </div>
        
    </div>
    </div>
@endsection