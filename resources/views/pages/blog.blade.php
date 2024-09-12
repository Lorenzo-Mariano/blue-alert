<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/blog.css'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>
</head>

<body>
    @include('components.navbar')
    <h1>
        Mga blog posts na informational and about the ocean should be here
    </h1>
</body>

</html>
