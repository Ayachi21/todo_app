<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//admin
Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function(){ 
    Route::resource('user','UserController');  
    Route::resource('tasks','TaskController');
    Route::resource('project','ProjectController');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('utilisateur','WorkerController');


