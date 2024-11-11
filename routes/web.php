<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


// Just pages

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/articles/{page?}', function (Request $request, int $page = 1) {
    // Start the query with unrestricted, non-banned articles
    $articlesQuery = Article::where('is_restricted', false)
        ->whereHas('author', function ($query) {
            $query->where('is_banned', false);
        });

    // Apply search filter if present
    if ($searchTerm = $request->query('search')) {
        $articlesQuery->where('title', 'like', '%' . $searchTerm . '%');
    }

    // Apply sorting based on filter
    switch ($request->query('sort')) {
        case 'most_viewed':
            $articlesQuery->orderByDesc('reads');
            break;
        case 'oldest':
            $articlesQuery->orderBy('created_at', 'asc');
            break;
        default: // 'most_recent' or no sorting specified
            $articlesQuery->orderByDesc('created_at');
            break;
    }

    // Paginate the filtered and sorted results
    $articles = $articlesQuery->paginate(6, ['*'], 'page', $page);
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
    Route::get('/reason-form', [UserController::class, 'showReasonForm'])->name('admin.reasonForm');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/admin/user/{user}/update-admin-status', [AdminController::class, 'updateAdminStatus'])->name('admin.updateAdminStatus');
    Route::post('/user/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('admin.toggleAdmin');

    Route::post('/user/{user}/ban', [AdminController::class, 'banUser'])->name('admin.banUser');
    Route::post('/user/{user}/unban', [AdminController::class, 'unbanUser'])->name('admin.unbanUser');

    Route::post('/articles/{id}/restrict', [ArticleController::class, 'restrict'])->name('articles.restrict');
    Route::post('/articles/{id}/unrestrict', [AdminController::class, 'unrestrictArticle'])->name('admin.unrestrictArticle');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
