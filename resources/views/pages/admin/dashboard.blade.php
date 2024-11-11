<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['public/css/pages/dashboard.css'])
    <title>Blue Alert - Fight Water Pollution</title>
</head>

<body>
    @include('components.navbar')
    <main>
        <section class="banned-users">
            <div>
                <h2>Banned Users</h2>
                @if (session('user_status'))
                    <span class="status-message">{{ session('user_status') }}</span>
                @endif
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Ban Reason</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bannedUsers as $user)
                        <tr>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->ban_reason }}</td>
                            <td>
                                <form action="{{ route('admin.unbanUser', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="unban-button">Unban</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="restricted-articles">
            <div>
                <h2>Restricted Articles</h2>
                @if (session('article_status'))
                    <span class="status-message">{{ session('article_status') }}</span>
                @endif
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Restriction Reason</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restrictedPosts as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->author->first_name }} {{ $article->author->last_name }}</td>
                            <td>{{ $article->restriction_reason }}</td>
                            <td>
                                <form action="{{ route('admin.unrestrictArticle', $article->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="unrestrict-button">Unrestrict</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


        <section class="user-perms">
            <div>
                <h2>Manage User Permissions</h2>
                @if (session('perm_status'))
                    <span class="status-message">{{ session('perm_status') }}</span>
                @endif
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                            <td>
                                <form action="{{ route('admin.toggleAdmin', $user->id) }}" method="POST">
                                    @csrf
                                    <button
                                        type="submit">{{ $user->is_admin ? 'Revoke Admin' : 'Grant Admin' }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    @include('components.footer')
</body>

</html>
