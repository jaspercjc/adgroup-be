<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\RegisterRequest;

class RegisterController
{
    public function __invoke(RegisterRequest $request)
    {
        $input = $request->validated();

        $user = User::create($input);

        return new JsonResponse([
            'token' => $user,
            'message' => 'Registration successful.'
        ], JsonResponse::HTTP_CREATED);
    }
}
