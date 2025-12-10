<?php

namespace App\Http\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Request\StoreProjectRequest;

class ProjectService
{
    public function getAllByDesc()
    {
        return Project::orderBy('created_at', 'desc')->get();
    }

    public function getAllProjectByUserId($user_id)
    {
        if (!is_numeric($user_id)) {
            return response()->json(
                [
                    'error' => 'Invalid Format'
                ],
                422
            );
        }
        $user = User::findOrFail($user_id);
        $projects = $user->projects;
        return $projects;
    }
    public function createNewProject(StoreProjectRequest $reqeuest)
    {
        $projects = project::create($reqeuest->validated());
        return response()->json(
            [
                'message' => 'Project created successfully'
            ]
        );
    }
}
