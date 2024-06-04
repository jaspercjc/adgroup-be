<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class Login
{
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (! auth()->attempt($credentials)) {
            throw new AuthenticationException('Invalid credentials');
        }
    }
}
