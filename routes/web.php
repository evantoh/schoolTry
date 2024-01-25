<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// DEfault page when you log in
Route::get('/', function () {
    return view('welcome');
});

// ROute to list all tasks
Route::get('/tasks', [TaskController::class, 'listallTasks']);

// ROute to create tasks
Route::get('/tasks/create', [TaskController::class, 'create']);

//store/save tasks created using Post method
Route::post('/tasks', [TaskController::class, 'store']);

// get each tasks details by passing taskID
Route::get('/tasks/{task}', [TaskController::class, 'show']);

// edit tasks
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);

// update tasks
Route::put('/tasks/{task}', [TaskController::class, 'update']);

// delete tasks
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);



// Authentication Routes for  Jetstream which is  beautifully designed  for application scaffolding in Laravel that provides the necessary files and views for authentication, team management, and more. It uses Livewire for the front-end
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
