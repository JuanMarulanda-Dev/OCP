<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware('auth')->group(function (){

    Route::get('/home', function () {
        return view('Home');
    })->name("home");

    Route::get('perfil', function(){
        return view('Modules.Users.profile');
    })->name('usuarios.profile');
    
    Route::resource('/usuarios', App\Http\Controllers\UsersController::class);

    Route::resource('/proyectos', App\Http\Controllers\ProjectController::class);

});

