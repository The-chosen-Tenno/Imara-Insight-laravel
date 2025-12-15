<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/projects', [ProjectController::class, 'AllProjects']); //tested
Route::get('project/{id}', [ProjectController::class, 'ProjectById']); //tested
Route::get('/projects/user/{id}', [ProjectController::class, 'ProjectByUserId']); //tested
Route::post('/project', [ProjectController::class, 'NewProject']); //tested
Route::patch('/project/{id}', [ProjectController::class, 'UpdateProject']); //tested
Route::patch('/project/status/{id}', [ProjectController::class, 'UpdateStatus']); //tested

//Project Images


// Users
Route::get('/users', [UserController::class, 'AllUsers']); //tested
Route::get('/user/{id}', [UserController::class, 'UserById']); //tested
Route::post('/user', [UserController::class, 'NewUser']); //tested
Route::patch('/user/{id}', [UserController::class, 'UpdateUser']); //tested
Route::patch('/user/accept/{id}', [UserController::class, 'AcceptUser']); //tested
Route::patch('/user/decline/{id}', [UserController::class, 'DeclineUser']); //tested