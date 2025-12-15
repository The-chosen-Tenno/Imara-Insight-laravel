<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\leaveLimitService;

class LeaveLimitController extends Controller
{
    protected $leaveLimitService;

    public function __construct(leaveLimitService $leaveLimitService)
    {
        $this->leaveLimitService = $leaveLimitService;
    }


}
