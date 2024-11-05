<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use App\Services\Facades\AuthFacade;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(AuthRequest $request) : AuthResource
    {
        return AuthFacade::register($request);
    }

    public function login(LoginRequest $request) : AuthResource
    {
        return AuthFacade::login($request);
    }

    public function current() : AuthResource
    {
        return AuthFacade::current();
    }

    public function logout() : bool
    {
        return AuthFacade::logout();
    }
}
