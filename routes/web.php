<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get-involved', function () {
    return view('get-involved');
});

Route::get('/secret', function () {
    return "You aren't supposed to be here.";
});
