<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Books4u</title>
    </head>
    <body>
        @include('common.inc.header')
        @include('common.inc.messages')
            @yield('content')
        @include('common.inc.footer')
    </body>
</html>
