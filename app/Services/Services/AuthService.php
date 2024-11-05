<?php
namespace App\Services\Services;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use App\Services\Constructor\AuthConstructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthConstructor
{
    public function register(AuthRequest $request) : AuthResource
    {
        return AuthResource::make(
            User::create($request->validated())
        );
    }

    public function login(LoginRequest $request) : AuthResource
    {
        $validatedRequest = $request->validated();
        $user = User::where('email', $validatedRequest['email'])->first();

        if (!$user || !Hash::check($validatedRequest['password'], $user->password)) {
            abort(401);
        }
        return AuthResource::make($user);
    }

    public function current() : AuthResource
    {
        return AuthResource::make(Auth::user());
    }

    public function logout() : bool
    {
        Auth::logout();
        return true;
    }
}
