<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Logout extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        $user->logs()->create([
            'action' => 'Logged out.',
            'user_id' => $user->id,
        ]);

        $user->tokens()->delete();
        auth()->guard('web')->logout();

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
