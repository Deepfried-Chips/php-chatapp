<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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