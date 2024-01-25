<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AsanaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default page when you log in
Route::get('/', function () {
    return view('welcome');
});

// Route to list all tasks
Route::get('/tasks', [TaskController::class, 'listallTasks'])->name('tasks.listallTasks');

// Route to create tasks
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Store/save tasks created using Post method
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Get each task's details by passing taskID
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

// Edit tasks
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Update tasks
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Delete tasks
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Display tasks that are overdue
Route::get('/tasks/overdue', [TaskController::class, 'overdue'])->name('tasks.overdue');

// Fetch all Tasks from Asana
Route::get('/fetch-asana-tasks', [AsanaController::class, 'fetchAsanaTasks'])->name('tasks.fetchAsanaTasks');

// Get details of a task from Asana
Route::get('/tasks/{id}/details', [AsanaController::class, 'detailsFromAsana'])->name('tasks.detailsFromAsana');

// Authentication Routes for Jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
