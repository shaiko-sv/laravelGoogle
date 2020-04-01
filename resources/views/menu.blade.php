        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.index') }}">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.category.index') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            @auth()
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
            </li>
            @endauth
            <li class="nav-item">
                <a class="nav-link" href="/laravel">Laravel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vue') }}">VueJS</a>
            </li>
        </ul>
