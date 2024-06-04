<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/auth/csrf-cookie',[App\Http\Controllers\Auth\CreateCsrfCookie::class, 'show'])->name('auth.csrf-cookie');

Route::post('/register', App\Http\Controllers\RegisterController::class)->name('register');

Route::group(['middleware' => ['guest']], function () {
    Route::post('/auth/login', App\Http\Controllers\Auth\Login::class)->name('auth.login');
    Route::post('/auth/token', App\Http\Controllers\Auth\CreateToken::class)->name('auth.token');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', [App\Http\Controllers\MeController::class, 'show'])->name('me.show');
    Route::post('/auth/logout', App\Http\Controllers\Auth\Logout::class)->name('auth.logout');

    Route::resource("/ip-assignments", \App\Http\Controllers\IpAssignmentController::class);
    Route::resource("/activity-logs", \App\Http\Controllers\ActivityLogController::class);
});