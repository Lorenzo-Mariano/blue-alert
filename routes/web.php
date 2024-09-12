<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/get-involved', function () {
    return view('pages.get-involved');
});

Route::get('/secret', function () {
    return "You aren't supposed to be here.";
});
