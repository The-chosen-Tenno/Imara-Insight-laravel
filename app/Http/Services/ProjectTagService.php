<?php

namespace App\Http\Services;

use App\Http\Requests\StoreProjectTagRequest;
use App\Http\Requests\DeleteProjectTagRequest;
use App\Models\ProjectTag;
use App\Models\Project;
use App\Models\Tag;

class ProjectTagService
{
    public function getAllTagByProjectId($id)
    {
        $ProjectTags = Project::findOrFail($id);
        $tags = $ProjectTags->tags;
        return response()->json([
            "ProjectTags" => $tags
        ]);
    }

    public function createProjectTags(StoreProjectTagRequest $request)
    {
        $created = [];
        $newCreatedTag = [];
        foreach ($request->validated()['ProjectTag'] as $newTags) {
            if (isset($newTags['name'])) {
                foreach ($newTags['name'] as $name) {
                    $tag = Tag::firstOrCreate(['name' => $name]);
                    $newCreatedTag[] = ProjectTag::firstOrCreate([
                        'tag_id' => $tag->id,
                        'project_id' => $newTags['project_id']
                    ]);
                }
            }
            if (isset($newTags['tag_id'])) {
                foreach ($newTags['tag_id'] as $tag_id) {
                    $created[] = ProjectTag::firstOrCreate([
                        'tag_id' => $tag_id,
                        'project_id' => $newTags['project_id']
                    ]);
                }
            }
        }
        return response()->json([
            "Project Tags" => $created,
            "New Tags" => $newCreatedTag
        ]);
    }

    public function removeProjectTags(DeleteProjectTagRequest $request)
    {
        $deleted = [];
        foreach ($request->validated()['DeleteTag'] as $item) {
            $count = ProjectTag::where('project_id', $item['project_id'])
                ->whereIn('tag_id', $item['tag_id'])
                ->delete();
            $deleted[] = [
                'project_id' => $item['project_id'],
                'deleted_count' => $count
            ];
        }
        return response()->json([
            "data" => $deleted
        ]);
    }
}
