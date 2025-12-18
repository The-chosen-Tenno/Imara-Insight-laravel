<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TagService;
use App\Http\Requests\StoreTagRequest;
class TagController extends Controller
{
    protected $TagService;

    public function __construct(TagService $TagService)
    {
        $this->TagService = $TagService;
    }

    public function NewTags(StoreTagRequest $request)
    {
        return $this->TagService->createNewTags($request);
    }

    public function AllTags()
    {
        return $this->TagService->getAllTags();
    }
}
