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
        <form action="{{ $formAction }}" method="POST">
            @csrf
            <h1>{{ request('action') === 'banUser' ? 'Ban User' : 'Restrict Post' }}</h1>
            <div>
                <label for="reason">Provide a reason:</label>
                <textarea name="reason" id="reason" rows="4" required></textarea>
                <button type="submit">Submit</button>
            </div>
        </form>
    </main>
    @include('components.footer')
</body>

</html>
