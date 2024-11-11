<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


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
    // views
    Route::get('/profile', [UserController::class, 'findOne']);

    Route::get('/create-article', function () {
        return view('pages.create-article');
    });
    Route::get('/article/{id}/edit', [ArticleController::class, 'showEditForm'])->name('articles.edit');

    Route::get('/secret', function () {
        return "You aren't supposed to be here.";
    });


    // mutations
    Route::post('/article', [ArticleController::class, 'create']);
    Route::patch('/article/{id}/edit', [ArticleController::class, 'edit'])->name('articles.update');

    Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
