<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/home', function () {
    return view('Home');
})->name("home");

Route::get('/usuarios', function () {
    return view('Modules/users/index');
})->name("usuers");

Route::get('/usuarios/create', function () {
    return view('Modules/users/create');
})->name("usuers.create");