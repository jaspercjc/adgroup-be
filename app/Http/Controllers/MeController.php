<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MeController extends Controller
{
    /**
     * Show the currently logged in user
     */
    public function show(Request $request): JsonResponse
    {
        $user = $request->user();

        return new JsonResponse($user, Response::HTTP_OK);
    }
}
