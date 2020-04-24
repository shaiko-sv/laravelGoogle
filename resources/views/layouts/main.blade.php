<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags for BOOTSTRAP -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    </head>
    <body>

{{--    @dump (session())--}}

        <div id="app">

            <!-- Content here -->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left Side Of Navbar -->

                        @yield('menu')

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('login')?'active':'' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('register')?'active':'' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @if(Auth::user()->avatar)
                                            <img src="{{ Auth::user()->avatar }}" alt="avatar" style="width: 30px">
                                        @else
                                            <i class="fas fa-user"></i>
                                        @endif
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile.show', Auth::user()) }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('profile-form').submit();">
                                            {{ __('Profile') }}
                                        </a>
                                        <form id="profile-form" action="{{ route('profile.show', Auth::user()) }}" method="GET" style="display: none;">
                                            @csrf
                                        </form>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @if (session('success'))
                @component('success')
                    @slot('title')
                        Success
                    @endslot
                    {{ session('success') }}
                @endcomponent
            @endif
            @if (session('error'))
                @component('alert')
                    @slot('title')
                        Error
                    @endslot
                    {{ session('error') }}
                @endcomponent
            @endif
            <div class="py-4">

                @yield('content')

            </div>

            @yield('footer')

{{--        {!! $menu !!}    --}}
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
