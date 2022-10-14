@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New User.</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('user.index')}}"> Back</a>
        </div>
    </div>
</div>
                    <form method="POST" action="{{ route('user.store') }}"   class="d-flex justify-content-center align-items-center">
                        @csrf
                        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required autocomplete="name" autofocus>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>role:</strong>
                <input type="text" name="role" class="form-control" placeholder="role" required autocomplete="role" autofocus>
        </div>
                        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email Adresse:</strong>
                <input id="email" type="email" name="email" class="form-control" placeholder="email" required autocomplete="email" autofocus>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password :</strong>
                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password" >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>confirm Password :</strong>
                <input id="password-confirm" type="password" name="password_wonfirmation" class="form-control" placeholder="confirm password"  autofocus>
            </div>
        </div>
                        
                        
                        

                      

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </form>
                
@endsection