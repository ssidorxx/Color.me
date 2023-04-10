<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <script defer src="{{'js/app.js'}}"></script>
        <script defer src="{{'js/bootstrap.bundle.min.js'}}"></script>
        <title>@yield('title')</title>

    </head>
    <body class="antialiased" style="margin-top:-5em; background-color: rgba(243, 242, 242, 0.12);">

        @include('inc.admin_header')
        @yield('content')



        @stack('script')
    </body>
</html>



