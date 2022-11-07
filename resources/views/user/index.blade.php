
@extends('user.layout')
 
 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2> user Manager </h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{route('user.create')}}"> Create New user</a>
             </div>
         </div>
     </div>
     <div>
            <div class="mx-auto pull-right">
     <div class="">
        
     <form action="{{ route('user.index') }}" method="GET" role="search">
    
    <div class="input-group">
        <span class="input-group-btn mr-5 mt-1 ">
            <button class="btn btn-info mb-5" type="submit" title="Search users" style="font-size: 24px">
                <span class="fa fa-search"></span>
            </button>
        </span>
        <input type="text" class="form-control mr-2" name="term" placeholder="Search users" id="term">
        <a href="{{ route('user.index') }}" class=" mt-1">
            <span class="pull-right " style=" position: absolute; top: 1px; left: 260px;">
                <button class="btn btn-light pull-right " type="button" title="Refresh page" style="font-size: 20px">
                    <span class="fa fa-refresh "></span>
                </button>
            </span>
            
        </a>
    </div>
</form>
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
         @foreach ($users as $user)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $user->name }}</td>
             
             <td>{{ $user->email }} <br> {{ $user->role }} </td>
             <td>
                 <form action="{{ route('user.destroy',$user->id) }}" method="POST">
    
                     <a class="btn btn-info" href="{{route('user.show',$user->id)}}">Show</a>
                     
                     <a class="btn btn-primary" href="{{route('user.edit',$user->id)}}">Edit</a>
    
                     @csrf
                     @method('DELETE')
       
                     <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
             </td>
         </tr>
         @endforeach
     </table>
   
     {!! $users->links() !!}
       
 @endsection