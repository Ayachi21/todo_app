<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   
    public function handle(Request $request, Closure $next)
    {
       if(Auth::check()){

            if(Auth::user()->role =="Admin") {
                return $next($request);
            }else{  
                Alert::warning('acces denied', " you don't have the right");
                return redirect('/home');
            }

       }else {
        return redirect('/login')->with(alert()->error('Failed', 'login to access the website'));

       }
       
        return $next($request);
    }
}
