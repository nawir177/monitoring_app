<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\mahasiswaControllers;
use App\Http\Controllers\TaskProjectController;
use App\Http\Controllers\ClientController;

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



Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::resource('/project', ProjectController::class);
    Route::resource('/progres', ProgresController::class);
    Route::resource('/leader', LeaderController::class);
    Route::resource('/task_project', TaskProjectController::class);
    Route::get('createTask/{id}', [TaskProjectController::class, 'createTask']);
    Route::post('/task_update/{id}', [TaskProjectController::class, 'updateTask']);
    Route::get('/task_project/delete/{id}', [TaskProjectController::class, 'TaskDelete']);
    Route::resource('/client', ClientController::class);
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
});
Route::get('/',function(){
    return view('login.index');
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [LoginController::class, 'register_view'])->name('register')->middleware('guest');
Route::post('/register_input', [LoginController::class, 'register'])->name('register_input');
