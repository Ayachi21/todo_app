
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
         @foreach ($user as $users)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $users->name }}</td>
             
             <td>{{ $users->detail }}</td>
             <td>
                 <form action="{{ route('user.destroy',$users->id) }}" method="POST">
    
                     <a class="btn btn-info" href="{{route('user.show',$users->id)}}">Show</a>
                     
                     <a class="btn btn-primary" href="{{route('user.edit',$users->id)}}">Edit</a>
    
                     @csrf
                     @method('DELETE')
       
                     <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
             </td>
         </tr>
         @endforeach
     </table>
   
     {!! $user->links() !!}
       
 @endsection