<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/login', function () {
    return view('auth.login');
});

// Projects
Route::get('/projects', [ProjectController::class, 'AllProjects']);
Route::get('project/{id}', [ProjectController::class, 'ProjectById']);
Route::get('/projects/user/{id}', [ProjectController::class, 'ProjectByUserId']);
Route::post('/project', [ProjectController::class, 'NewProject']);
Route::patch('/project/{id}', [ProjectController::class, 'UpdateProject']);
Route::patch('/project/status/{id}', [ProjectController::class, 'UpdateStatus']);

//Project Images


// Users
Route::get('/users', [UserController::class, 'AllUsers']);
Route::get('/user/{id}', [UserController::class, 'UserById']);
Route::post('/user', [UserController::class, 'NewUser']);
Route::patch('/user/{id}', [UserController::class, 'UpdateUser']);
Route::patch('/user/accept/{id}', [UserController::class, 'AcceptUser']);
Route::patch('/user/decline/{id}', [UserController::class, 'DeclineUser']);

