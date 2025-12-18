<?php

namespace App\Http\Services;

use App\Models\ProjectImage;
use App\Models\Project;
use App\Http\Requests\StoreProjectImageRequest;
use App\Http\Requests\UpdateProjectImageRequest;

class ProjectImageService
{

    public function getImagesByProjectId($id)
    {
        $project = Project::findOrFail($id);
        return $project->images;
    }

    public function createNewImage(StoreProjectImageRequest $request, $id)
    {
        //
    }

    public function updateImage(UpdateProjectImageRequest $request)
    {
        //
    }
}
