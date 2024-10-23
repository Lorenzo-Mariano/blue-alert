<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// Just pages

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/articles/{page?}', function (int $page = 1) {
    $articles = Article::latest()->paginate(6, ['*'], 'page', $page);
    $hasArticles = $articles->isNotEmpty();

    return view('pages.articles', [
        'articles' => $articles,
        'hasArticles' => $hasArticles,
    ]);
});

Route::get('/article/{id}', function (string $id) {
    $article = Article::with(['author'])->findOrFail($id);
    $article->increment('reads');

    return view('pages.article', compact('article'));
});

Route::get('/about-us', function () {
    return view('pages.about-us');
});

Route::get('/get-involved', function () {
    return view('pages.get-involved');
})->name('login');

Route::get('/hail-Mary', function () {
    $files = Storage::disk('backblaze')->allFiles();

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
