<?php

namespace App\Http\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\UpdateProjectStatusRequest;

class ProjectService
{
    // Get Functions Starts Here
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

    public function getAllProjectById($project_id)
    {
        if (!is_numeric($project_id)) {
            return response()->json(
                [
                    'error' => 'Invalid Format'
                ],
                422
            );
        }
        $project = Project::findOrFail($project_id);
        return $project;
    }
    // Get Functions Ends Here


    // Create Functions Start Here
    public function createNewProject(StoreProjectRequest $request)
    {
        $projects = Project::create($request->validated());
        return response()->json(
            [
                'message' => 'Project created successfully',
                'date' => $projects
            ]
        );
    }
    // Create Function End Here


    // Update Functions Start Here
    public function updateProject(UpdateProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->fill($request->validated());
        $project->save();
        return response()->json(
            [
                'message' => 'Project successfully updated',
                'data' => $project,
                'validated' => $request->validated()
            ]
        );
    }

    public function UpdateProjectStatus(UpdateProjectStatusRequest $request, $id)
    {
        $Project = Project::findOrFail($id);
        $Project->fill($request->validated());
        $Project->save();
        return response()->json(
            [
                'message' => "Status successfully updated"
            ]
        );
    }
    // Update Functions End Here
}
