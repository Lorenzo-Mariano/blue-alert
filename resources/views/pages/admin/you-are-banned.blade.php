<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['public/css/pages/reason-form.css'])
    <title>Blue Alert - Fight Water Pollution</title>
</head>

<body>
    @include('components.navbar')
    <main>
        <h1>You can't access this page because you are banned.</h1>
    </main>
    @include('components.footer')
</body>

</html>
