<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


// Just pages

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/articles/{page?}', function (int $page = 1) {
    $articles = Article::where('is_restricted', false)
        ->latest()
        ->paginate(6, ['*'], 'page', $page);

    $hasArticles = $articles->isNotEmpty();

    return view('pages.articles', [
        'articles' => $articles,
        'hasArticles' => $hasArticles,
    ]);
});


Route::get('/article/{id}', function (string $id) {
    $article = Article::with(['author'])->findOrFail($id);

    if ($article->is_restricted && !(Auth::check() && (Auth::user()->is_admin || Auth::id() === $article->author_id))) {
        return redirect('/articles')->with('error', 'This article is restricted and cannot be viewed.');
    }

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

Route::get('/privacy', function () {
    return view('pages.privacy');
});

// Functional stuff

Route::middleware(['auth'])->group(function () {
    // views
    Route::get('/profile', [UserController::class, 'findOne']);

    Route::get('/create-article', function () {
        if (Auth::check() && Auth::user()->is_banned) {
            return redirect()->route('articles.index')->with('error', 'Your account has been banned. You cannot create an article.');
        }

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

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::post('/user/{user}/ban', [UserController::class, 'banUser'])->name('admin.banUser');
    Route::post('/articles/{id}/restrict', [ArticleController::class, 'restrict'])->name('articles.restrict');

    Route::get('/reason-form', [UserController::class, 'showReasonForm'])->name('admin.reasonForm');
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
