<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Just pages

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/articles', function () {
    return view('pages.articles');
});

Route::get('/about-us', function () {
    return view('pages.about-us');
});

Route::get('/get-involved', function () {
    return view('pages.get-involved');
})->name('login');

// Functional stuff

Route::middleware(['auth'])->group(function () {
    Route::get('/create-article', function () {
        return view('pages.create-article');
    });

    Route::get('/secret', function () {
        return "You aren't supposed to be here.";
    });
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);
