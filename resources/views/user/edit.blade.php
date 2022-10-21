
@extends('user.layout')
   
   @section('content')
       <div class="row">
           <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                   <h2>Edit user informations</h2>
               </div>
               <div class="pull-right">
                   <a class="btn btn-primary" href="{{route('user.index')}}"> Back</a>
               </div>s
           </div>
       </div>
      
       @if ($errors->any())
           <div class="alert alert-danger ">
               <strong>Whoops!</strong> There were some problems with your input.<br><br>
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
       
       <form action="{{ route('user.update',$users->id) }}" method="POST" class="d-flex justify-content-center align-items-center">
           @csrf
           @method('PUT')
           
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Name:</strong>
                       <input type="text" name="name" style="width: 400px" value="{{ $users->name }}" class="form-control" placeholder="Name">
                   </div>
               </div>
               
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>email:</strong>
                       <input type="text" name="email" style="width: 400px" value="{{ $users->email }}" class="form-control" placeholder="email">
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <label for="cases">role :</label>
                        <select name="role" class="form-control" value="{{ $users->role }}">
                            <option selected>-- role --</option>    
                            <option value="Admin">Admin </option>
                            <option value="User">User</option>
                            
                        </select>
                </div>
                  
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>password:</strong>
                       <div class="col-md-6">
                                <input id="password"value="{{ $users->password }}" style="width: 400px" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <button type="submit" class="btn btn-primary">Submit</button>
               </div>
           </div>
           
       </form>
   @endsection 