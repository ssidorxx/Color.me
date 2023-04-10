<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Tenor+Sans" />
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Noto+Sans" />

        {{-- FAVICON --}}
        <link type="image/x-icon" href="{{asset('/images/icons/CM.svg') }}" rel="shortcut icon">
        <link type="Image/x-icon" href="{{asset('/images/icons/CM.svg')}}" rel="icon">

{{--        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">--}}






        <title>@yield('title')</title>

    </head>
    <body class="antialiased foots">

    <div>
        @include('inc.header')

        @yield('content')
    </div>
        @include('inc.footer')

        @stack('script')

        <script defer src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

{{--        <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>--}}
{{--        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>--}}
    </body>
</html>



