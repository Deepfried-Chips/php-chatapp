<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth');

Route::get('/test', function () {
    return phpinfo();
});

Route::prefix('login')->group(function () {
    Route::prefix('discord')->group(function() {
        Route::get('redirect', [OAuthController::class, 'redirect']);
        Route::get('callback', [OAuthController::class, 'callback']);
    });
});