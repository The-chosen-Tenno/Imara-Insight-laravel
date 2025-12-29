<?php

namespace App\Http\Services;

use App\Http\Requests\StoreLeaveRequest;
use App\Models\User;
use App\Models\LeaveRequest;

class LeaveRequestService
{
    public function createNewLeave(StoreLeaveRequest $request)
    {
        $newLeave = auth()->user()->leaveRequests()->create($request->validated());
        // if($newLeave)
        // {

        // }
        return response()->json([
            'success' => true,
            'message' => 'Leave requested successfully'
        ]);
    }
}
