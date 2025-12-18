<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectImageRequest;
use App\Http\Requests\UpdateProjectImageRequest;
use App\Http\Services\ProjectImageService;

class ProjectImageController extends Controller
{
    protected $ProjectImageService;

    public function __construct(ProjectImageService $ProjectImageService)
    {
        $this->ProjectImageService = $ProjectImageService;
    }
    
    public function ImagesByProjectId($id)
    {
        return $this->ProjectImageService->getImagesByProjectId($id);
    }

    public function NewImage(StoreProjectImageRequest $request, $id)
    {
        return $this->ProjectImageService->createNewImage($request, $id);
    }

    public function UpdateImage(UpdateProjectImageRequest $request)
    {
        return $this->ProjectImageService->updateImage($request);
    }
}
