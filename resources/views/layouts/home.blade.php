<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        @vite(['public/assets/css/styles-home.css', 'resources/js/app.js'])
    </head>
    <body>
        
        @include('layouts.homesite.home-navbar')

        <div>
            @include('layouts.homesite.home-header')
        </div>

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.homesite.home-footer')
        </div>



        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts-home.js') }}"></script>
    </body>
</html>
