<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;



Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/login', function() {
    return view('auth.login');
});


Route::get('/projects', [ProjectController::class, 'AllProjects']);
Route::get('/projects/user/{id}', [ProjectController::class, 'ProjectById']);
// Route::post('/projects/create', [ProjectController::class, 'NewProject']);