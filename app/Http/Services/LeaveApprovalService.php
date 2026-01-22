<?php

namespace App\Http\Services;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveApprovalService
{
    public function approveLeave(Request $request)
    {
        $updated = LeaveRequest::where('id', $request->id)
            ->update(['status' => 'approved']);

        return response()->json([
            'success' => $updated > 0,
            'message' => $updated ? 'Leave approved' : 'Leave not found',
        ]);
    }
    public function denyLeave(Request $request)
    {
        $updated = LeaveRequest::where('id', $request->id)
            ->update(['status' => 'denied']);

        return response()->json([
            'success' => $updated > 0,
            'message' => $updated ? 'Leave denied' : 'Leave not found',
        ]);
    }
}
