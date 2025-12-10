<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\StoreProjectRequest;

use  App\Http\Services\ProjectService;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    protected $ProjectService;

    public function __construct(ProjectService $ProjectService)
    {
        $this->ProjectService = $ProjectService;
    }

    public function AllProjects(Request $request)
    {
        return $this->ProjectService->getAllByDesc();
    }

    public function ProjectById($id)
    {
        return $this->ProjectService->getAllProjectByUserId($id);
    }

    public function NewProject(StoreProjectRequest $request)
    {
        return $this->ProjectService->createNewProject($request);
    }
}
