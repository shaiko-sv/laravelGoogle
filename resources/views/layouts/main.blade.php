<!doctype html>
<html>
    <head>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <!-- Required meta tags for BOOTSTRAP -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>News @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">

            <!-- Content here -->
            @yield('menu')


            <div class="py-4">

                @yield('content')

            </div>

            @yield('footer')

{{--        {!! $menu !!}    --}}
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
