<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::latest()->paginate(5);
  
        return view('user.index',compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed|min:8|max:30',
            'password_confirmation' => 'required|min:8|max:30',
            
        ]);
  
         user::create($ $validatedData );
         
    
        return User::create([
            'name' => ['name'],
            'email' => ['email'],
            'password' => ['password'],
            'role'=> ['role'],
        ]);
    
   
        return redirect('/user.index')->with('success','user created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  AppModelsTask  $task
     * @return IlluminateHttpResponse
     */
    public function show(user $user)
    {
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppModelsTask  $user
     * @return IlluminateHttpResponse
     */
    public function edit(user $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  AppModelsTask  $user
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
  
        $user->update($request->all());
  
        return redirect()->route('user.index')
                        ->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AppModelsTask  $user
     * @return IlluminateHttpResponse
     */
    public function destroy(user $user)
    {
        $user->delete();
  
        return redirect()->route('user.index')
                        ->with('success','user deleted successfully');
    }
}
