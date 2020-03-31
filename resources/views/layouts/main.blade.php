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
        <div class="container" id="app">

            <!-- Content here -->
            @section('menu')

            @show

            <div class="container">

                @section('content')

                @show
            </div>

            @section('footer')

            @show
{{--            {!! $menu !!}--}}
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
