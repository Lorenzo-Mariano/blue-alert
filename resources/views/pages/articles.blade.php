<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/articles.css'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Fight Water Pollution</title>
</head>

<body>
    @include('components.navbar')
    <main>
        <div class="left-panel">
            @if (Auth::check())
                @include('components.article-controls')
                <hr>
            @endif
            @include('components.article-filters')
        </div>

        <div class="content">
            @if (!$hasArticles)
                <div class="blogs">
                    @foreach ($articles as $article)
                        @include('components.article-preview', ['article' => $article])
                    @endforeach
                </div>
            @else
                <div class="msg-wrapper">
                    <h1 class="no-articles shadow-1">No articles have been posted yet. Check back later!</h1>
                </div>
            @endif

            <div class="page-select">1 2 3</div>
        </div>
    </main>
    @include('components.footer')
</body>

</html>
