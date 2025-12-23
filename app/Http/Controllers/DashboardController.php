<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function dashboardData()
    {
        $user = auth()->user();
        $projects = $user->projects;
        $leaveRequests = $user->leaveRequests;
        return view('pages.dashboard', compact('projects', 'user', 'leaveRequests'));
    }
}
