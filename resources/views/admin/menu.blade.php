            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.newsCrud.index')?'active':'' }}" href="{{ route('admin.newsCrud.index') }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.categoriesCrud.index')?'active':'' }}" href="{{ route('admin.categoriesCrud.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.usersCrud.index')?'active':'' }}" href="{{ route('admin.usersCrud.index') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.downloadImage')?'active':'' }}" href="{{ route('admin.downloadImage') }}">Download Image</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.downloadJson')?'active':'' }}" href="{{ route('admin.downloadJson') }}">Download JSON</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->path() === 'laravel'?'active':'' }}" href="/laravel">Laravel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('vue')?'active':'' }}" href="{{ route('vue') }}">VueJS</a>
                </li>
            </ul>
