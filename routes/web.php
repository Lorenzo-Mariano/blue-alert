<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

// Just pages

Route::get('/', function () {
    return view('pages.welcome');
});


Route::get('/articles', function () {
    $articles = Article::with('author')->get(); // Fetch all articles with author data
    $hasArticles = $articles->isNotEmpty(); // Check if there are any articles

    return view('pages.articles', [
        'articles' => $articles,
        'hasArticles' => $hasArticles,
    ]);
});


Route::get('/about-us', function () {
    return view('pages.about-us');
});

Route::get('/get-involved', function () {
    return view('pages.get-involved');
})->name('login');

Route::get('/hail-Mary', function () {
    $files = Storage::disk('backblaze')->allFiles();

    // Return a view or JSON response with the list of files
    return response()->json($files);
});

// Functional stuff

Route::middleware(['auth'])->group(function () {
    Route::get('/create-article', function () {
        return view('pages.create-article');
    });

    Route::get('/secret', function () {
        return "You aren't supposed to be here.";
    });

    Route::post('/article', [ArticleController::class, 'create']);
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);
