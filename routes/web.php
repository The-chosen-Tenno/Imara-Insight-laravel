<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProjectTagController;
use App\Http\Controllers\ProjectSubAssigneeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/auth/create_account', function () {
    return view('auth.create_account');
})->name('create.account');

//View
Route::middleware('auth')->prefix('pages')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboardData']);
    Route::view('/billing', 'pages.billing');
    Route::view('/profile', 'pages.profile');
});

//Auth
Route::post('/user', [UserController::class, 'NewUser'])->name('store.user');
Route::post('/login', [AuthController::class, 'Login']);
Route::post('/logout', [AuthController::class, 'Logout'])->middleware('auth');

//Project (tested)
Route::middleware('auth')->controller(ProjectController::class)->group(function () {
    Route::get('/projects', 'AllProjects');
    Route::get('project/{id}', 'ProjectById');
    Route::get('/projects/user/{id}', 'ProjectByUserId');
    Route::post('/project', 'NewProject');
    Route::patch('/project/{id}', 'UpdateProject');
    Route::patch('/project/status/{id}', 'UpdateStatus');
});

//Project Images
Route::get('/images/project/{id}', [ProjectImageController::class, 'ImagesByProjectId']);
Route::post('/images/project/{id}', [ProjectImageController::class, 'NewImage']);
Route::patch('/images', [ProjectImageController::class, 'UpdateImage']);

//Project Tags
Route::get('/project-tags/{id}', [ProjectTagController::class, 'AllTagByProject']); //tested
Route::post('/project-tags', [ProjectTagController::class, 'NewProjectTags']);
Route::delete('/project-tags/remove', [ProjectTagController::class, 'RemoveTags']);

//Project Sub Assignee
Route::get('/sub-assignee/project/{id}', [ProjectSubAssigneeController::class, 'AllSubAssigneeByProject']);
Route::get('/sub-assignee/user/{id}', [ProjectSubAssigneeController::class, 'AllSubAssignedProjectByUser']);
Route::post('/sub-assignee/add', [ProjectSubAssigneeController::class, 'NewSubAssignee']);
Route::patch('/sub-assignee/remove', [ProjectSubAssigneeController::class, 'RemoveSubAssignee']);

// Users (tested)
Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/users', 'AllUsers');
    Route::get('/user/{id}', 'UserById');
    Route::patch('/user/{id}', 'UpdateUser');
    Route::patch('/user/accept/{id}', 'AcceptUser');
    Route::patch('/user/decline/{id}', 'DeclineUser');
});

//Tag (tested)
Route::middleware('auth')->prefix('tags')->controller(TagController::class)->group(function () {
    Route::get('/', 'AllTags');
    Route::post('/', 'NewTags');
});
