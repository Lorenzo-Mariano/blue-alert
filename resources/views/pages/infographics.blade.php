<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/blog.css'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>
</head>

<body>
    @include('components.navbar')
    <h1>
        Mga infographics na dito ilalagay, lalalala
    </h1>
</body>

</html>
