<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::all();
        $users = User::latest()->paginate(5) ;   
        return view('user.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


 /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed|min:8|max:30|unique:users',
           
            
        ]);
            
        $users= User::create( request(['name','email','password','role']) );
       
   
        return redirect()->route('user.index')->with('success','user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  AppModelsUser  $user
     * @return IlluminateHttpResponse
     */
    public function show( $id)
    {
        $users = User::findOrFail($id);
       
        return view('user.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppModelsUser  $user
     * @return IlluminateHttpResponse
     */
    public function edit( $id)
    {
        
        $users = User::findOrFail($id);
        
        return view('user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  AppModelsUser  $user
     * @return IlluminateHttpResponse
     */
    public function update(Request $request,  $id)
    {
        $upp=$request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|min:8|max:30',
        ]);
  
        User::whereId($id)->update($upp);
  
        return redirect()->route('user.index')
                        ->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AppModelsUser  $user
     * @return IlluminateHttpResponse
     */
    public function destroy( $id)
    {
        $users= User::findOrFail($id);
        $users->delete();
  
        return redirect()->route('user.index',compact('users'))
                        ->with('success','user deleted successfully');
    }
}

