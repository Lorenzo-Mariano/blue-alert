<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/articles.css', 'public/css/components/article-filters.css', 'public/css/components/article-preview.css'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>
</head>

<body>
    @include('components.navbar')
    <main>
        @include('components.article-filters')
        <div class="blogs">
            @include('components.article-preview')
            @include('components.article-preview')
            @include('components.article-preview')
            @include('components.article-preview')
            @include('components.article-preview')
            @include('components.article-preview')
            @include('components.article-preview')
            @include('components.article-preview')
            @include('components.article-preview')
        </div>
    </main>
</body>

</html>
