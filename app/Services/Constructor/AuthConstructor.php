<?php
namespace App\Services\Constructor ;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;

interface AuthConstructor
{
    public function register(AuthRequest $request) : AuthResource;

    public function login(LoginRequest $request) : AuthResource;

    public function current() : AuthResource;

    public function logout() : bool;
}