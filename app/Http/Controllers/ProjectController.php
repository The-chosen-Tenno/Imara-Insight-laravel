<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\UpdateProjectStatusRequest;
use Illuminate\Http\Request;
use App\Http\Services\ProjectService;
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
        return $this->ProjectService->getAllProjectById($id);
    }

    public function ProjectByUserId($id)
    {
        return $this->ProjectService->getAllProjectByUserId($id);
    }

    public function NewProject(StoreProjectRequest $request)
    {
        return $this->ProjectService->createNewProject($request);
    }

    public function UpdateProject(UpdateProjectRequest $request, $id)
    {
        return $this->ProjectService->updateProject($request, $id);
    }

    public function UpdateStatus(UpdateProjectStatusRequest $request, $id)
    {
        return $this->ProjectService->UpdateProjectStatus($request, $id);
    }

    public function index()
    {
        $projects = Project::all();
        return view('pages.projects', compact('projects'));
    }
}
