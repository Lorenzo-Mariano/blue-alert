<?php

use Illuminate\Support\Facades\Route;

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
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/signup', function () {
    return view('pages.signup');
});

Route::get('/secret', function () {
    return "You aren't supposed to be here.";
});
