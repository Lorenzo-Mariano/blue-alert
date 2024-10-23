<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['public/css/pages/create-article.css', 'public/css/components/create-article-form.css'])
    <script src="{{ asset('js/components/create-article-form.js') }}" defer></script>
    <title>Blue Alert - Fight Water Pollution</title>
</head>

<body>
    @include('components.navbar')
    <main>
        @include('components.create-article-form')
    </main>
    @include('components.footer')
</body>

</html>
