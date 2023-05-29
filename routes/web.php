<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render("home");
});

Route::get('/listings', function () {
    return Inertia::render("listings", [
        'listings' => Listing::all()
    ]);
});

Route::get('/listing/{id}', function ($id) {
    return Inertia::render("listing", [
        'listing' => Listing::find($id)
    ]);
});

Route::get('/listing', function () {
    return redirect('/listings');
});

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/users/me', [UserController::class, 'me'])->middleware('auth');

Route::post('/users/modify', [UserController::class, 'modify'])->middleware('auth');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);
