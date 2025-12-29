<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LeaveRequestService;
use App\Http\Requests\StoreLeaveRequest;

class LeaveRequestsController extends Controller
{
    protected $LeaveRequestService;

    public function __construct(LeaveRequestService $LeaveRequestService)
    {
        $this->LeaveRequestService = $LeaveRequestService;
    }
    
    public function NewLeaveRequest(StoreLeaveRequest $request)
    {
        return $this->LeaveRequestService->createNewLeave($request);
    }
}
