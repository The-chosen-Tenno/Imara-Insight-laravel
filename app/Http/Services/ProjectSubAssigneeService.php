<?php

namespace App\Http\Services;

use App\Models\ProjectSubAssignee;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\StoreProjectSubAssigneeRequest;
use App\Http\Requests\RemoveProjectSubAssigneeRequest;

class ProjectSubAssigneeService
{
    public function getSubAssigneeByProject($id)
    {
        $project = Project::findOrFail($id);
        $subAssignee = $project->subAssignees;
        return response()->json([
            "data" => $subAssignee
        ]);
    }

    public function getSubAssigneeByUser($id)
    {
        $user = User::findOrFail($id);
        $subAssignee = $user->ProjectSubAssignee;
        return response()->json([
            "data" => $subAssignee
        ]);
    }

    public function createNewSubAssignee(StoreProjectSubAssigneeRequest $request)
    {
        $created = [];
        foreach ($request->validated()['SubAssignee'] as $newAssignee) {
            $created[] = ProjectSubAssignee::firstOrCreate([
                'project_id' => $newAssignee['project_id'],
                'user_id' => $newAssignee['user_id']
            ]);
        }
        return response()->json([
            "message" => "New sub assignees created successfully",
            "data" => $created
        ]);
    }

    public function removeSubAssignee(RemoveProjectSubAssigneeRequest $request)
    {
        //
    }
}
