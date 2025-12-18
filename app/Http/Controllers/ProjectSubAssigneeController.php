<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectSubAssigneeRequest;
use App\Http\Requests\RemoveProjectSubAssigneeRequest;
use App\Http\Services\ProjectSubAssigneeService;

class ProjectSubAssigneeController extends Controller
{
    protected $ProjectSubAssigneeService;

    public function __construct(ProjectSubAssigneeService $ProjectSubAssigneeService)
    {
        $this->ProjectSubAssigneeService = $ProjectSubAssigneeService;
    }

    public function AllSubAssigneeByProject($id)
    {
        $this->ProjectSubAssigneeService->getSubAssigneeByProject($id);
    }

    public function AllSubAssignedProjectByUser($id)
    {
        $this->ProjectSubAssigneeService->getSubAssigneeByUser($id);
    }

    public function NewSubAssignee(StoreProjectSubAssigneeRequest $request)
    {
        $this->ProjectSubAssigneeService->createNewSubAssignee($request);
    }

    public function RemoveSubAssignee(RemoveProjectSubAssigneeRequest $request)
    {
        $this->ProjectSubAssigneeService->removeSubAssignee($request);
    }
}
