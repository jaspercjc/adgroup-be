<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class CreateCsrfCookie
 *
 * @group Auth
 */
class CreateCsrfCookie extends Controller
{
    /**
     * GET - Generate CSRF Cookie
     *
     * Return an empty response simply to trigger the storage of the CSRF cookie in the browser.
     *
     * @unauthenticated
     */
    public function show(Request $request)
    {
        if ($request->expectsJson()) {
            return new JsonResponse(status: 204);
        }

        return new Response(status: 204);
    }
}
