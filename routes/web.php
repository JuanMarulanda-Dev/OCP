<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UsersController;
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

//Session Routes
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Passwrod Reset Routes
Route::get('/password/reset', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');


Route::middleware('auth')->group(function (){   
    
    // Projects
    Route::get('/proyectos', [ProjectController::class, 'index'])->name('proyectos.index');
    Route::get('/proyectos/{proyecto}', [ProjectController::class, 'show'])->name('proyectos.show');
    Route::get('/proyectos/{proyecto}/edit', [ProjectController::class, 'edit'])->name('proyectos.edit');
    Route::get('/proyectos/create', [ProjectController::class, 'create'])->name('proyectos.create');

    // usuarios
    Route::get('/usuarios', [UsersController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{usuario}', [UsersController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuario}/edit', [UsersController::class, 'edit'])->name('usuarios.edit');
    Route::get('/usuarios/create', [UsersController::class, 'create'])->name('usuarios.create');

    // Prifile
    Route::get('perfil', function(){

        return view('Modules.Users.profile');
        
    })->name('usuarios.profile');

    //Contacto
    Route::get('/contacto', [ContactController::class, 'showContactForm'])->name('contacto.request');

});

