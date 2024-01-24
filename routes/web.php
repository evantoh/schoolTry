<?php

use Illuminate\Support\Facades\Route;

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
