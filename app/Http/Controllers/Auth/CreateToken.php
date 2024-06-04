<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequest;

class CreateToken
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        try {
            $credentials = $request->validated();

            $user = User::where('email', $request->email)->first();
    
            if (! $user) {
                $user = User::where('email', $request->email)->first();
            }

            if (! $user || ! Hash::check($request->password, $user->password)) {
                return new JsonResponse(['message' => 'The provided credentials are incorrect'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }
            
            $token = $user->createToken('app')->plainTextToken;

            return new JsonResponse(['token' => $token], JsonResponse::HTTP_OK);
        } catch (\Throwable $e) {
            return new JsonResponse([
                'error', $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
