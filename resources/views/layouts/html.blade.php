<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
        <meta name="csrf-token" content="csrf-token">
        <title>My App</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('header-styles')
    </head>

    <body>

        @include('partials.menu')

        @yield('content')

        @yield('footer-script')

        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>