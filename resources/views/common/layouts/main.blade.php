<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Roboto&display=swap" rel="stylesheet">
        <title>Books4u</title>
    </head>
    <body>
        @include('common.inc.nav')
        <div class="container">
            @include('common.inc.messages')
            @yield('content')
        </div>
        @include('common.inc.footer')
        <script src="{{ asset ('js/app.js') }}"></script>
    </body>
</html>
