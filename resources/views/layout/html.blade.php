<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
        <title>My App</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('header-styles')
    </head>


    <body>

        @yield('content')

        @yield('footer-script')
    </body>
</html>