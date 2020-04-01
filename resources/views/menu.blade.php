        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('news.index')?'active':'' }}" href="{{ route('news.index') }}">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('news.category.index')?'active':'' }}" href="{{ route('news.category.index') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->path() === 'about'?'active':'' }}" href="/about">About</a>
            </li>
            @auth()
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.index')?'active':'' }}" href="{{ route('admin.index') }}">Admin</a>
            </li>
            @endauth
        </ul>
