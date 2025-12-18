<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectTagRequest;
use App\Http\Requests\DeleteProjectTagRequest;
use App\Http\Services\ProjectTagService;

class ProjectTagController extends Controller
{
    protected $ProjectTagService;

    public function __construct(ProjectTagService $ProjectTagService)
    {
        $this->ProjectTagService = $ProjectTagService;
    }
    
    public function AllTagByProject($id)
    {
        return $this->ProjectTagService->getAllTagByProjectId($id);
    }

    public function NewProjectTags(StoreProjectTagRequest $request)
    {
        return $this->ProjectTagService->createProjectTags($request);
    }

    public function RemoveTags(DeleteProjectTagRequest $request)
    {
        return $this->ProjectTagService->removeProjectTags($request);
    }
}
