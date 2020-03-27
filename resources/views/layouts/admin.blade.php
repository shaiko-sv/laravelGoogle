<!-- Stored in resources/views/layouts/app.blade.php -->
<!doctype html>
<html>
    <head>
        <!-- Required meta tags for BOOTSTRAP -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Laravel - @yield('title')</title>
{{--        <link rel="stylesheet" href="css/app.css">--}}
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>
    <body>
        <div class="container">
            <!-- Content here -->

        @section('navbar')

        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')

        @show
        </div>
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>
