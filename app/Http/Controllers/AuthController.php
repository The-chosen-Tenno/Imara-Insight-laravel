<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Services\AuthService;

class AuthController extends Controller
{
    protected $AuthService;

    public function __construct(AuthService $AuthService)
    {
        $this->AuthService = $AuthService;
    }
    
    public function Login(StoreAuthRequest $request)
    {
        $this->AuthService->saveSession($request);
    }

    public function Logout()
    {
        $this->AuthService->destroySession();
    }
}
