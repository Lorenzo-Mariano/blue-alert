<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['public/css/pages/profile.css'])
    <title>Blue Alert - Fight Water Pollution</title>
</head>

<body>
    @include('components.navbar')
    <main>
        <div class="profile-card">
            <h1>Profile Information</h1>
            <section>
                <p><strong>First Name:</strong> {{ $user->first_name }}</p>
                <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Admin:</strong> {{ $user->is_admin ? 'Yes' : 'No' }}</p>
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </section>
        </div>
    </main>
    @include('components.footer')
</body>

</html>
