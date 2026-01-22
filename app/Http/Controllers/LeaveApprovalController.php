<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use App\Http\Services\LeaveApprovalService;

class LeaveApprovalController extends Controller
{
    protected $LeaveApprovalService;

    public function __construct(LeaveApprovalService $LeaveApprovalService)
    {
        $this->LeaveApprovalService = $LeaveApprovalService;
    }

    public function index()
    {
        $leaveRequests = LeaveRequest::where('status', 'pending')->get();

        return view('pages.leave-approval', compact('leaveRequests'));
    }

    public function approveLeaveRequest(Request $request)
    {
        return $this->LeaveApprovalService->approveLeave($request);
    }
        public function denyLeaveRequest(Request $request)
    {
        return $this->LeaveApprovalService->denyLeave($request);
    }
}
