@vite(['public/css/components/article-filters.css'])

<nav action="/articles" method="GET" class="dashboard-links">
    <input type="text" name="search" placeholder="Search articles" value="{{ request('search') }}">
    <button type="submit" name="sort" value="most_viewed"
        {{ request('sort') == 'most_viewed' ? 'class=active' : '' }}>Most Viewed</button>
    <button type="submit" name="sort" value="most_recent"
        {{ request('sort') == 'most_recent' ? 'class=active' : '' }}>By Newest</button>
    <button type="submit" name="sort" value="oldest" {{ request('sort') == 'oldest' ? 'class=active' : '' }}>By
        Oldest</button>
</nav>
