<?php

namespace App\Http\Services;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;

class TagService
{
    public function createNewTags(StoreTagRequest $request)
    {
        $created = [];
        foreach ($request->validated('tag') as $tagName) {
            $created[] = Tag::firstOrCreate([
                'name' => $tagName
            ]);
        }
        return response()->json([
            "message" => $created
        ]);
    }

    public function getAllTags()
    {
        $tags = Tag::orderBy('name', 'asc')->get();
        return response()->json([
            'tags' => $tags
        ], 200);
    }
}
