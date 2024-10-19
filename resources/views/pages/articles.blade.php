<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/articles.css', 'public/css/components/article-filters.css'])
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
            <div class="blogs">
                @include('components.article-preview')
                @include('components.article-preview')
                @include('components.article-preview')
                @include('components.article-preview')
                @include('components.article-preview')
                @include('components.article-preview')
            </div>
            <div class="page-select">1 2 3</div>
        </div>
    </main>
    @include('components.footer')
</body>

</html>
