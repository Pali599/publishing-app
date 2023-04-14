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
        
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="{{ url('/') }}">EasyPublish</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto py-4 py-lg-0">
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('home/archive') }}">Archive</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('home/about') }}">About</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('home/contact') }}">Contact</a></li>
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end ms-auto py-4 py-lg-0" aria-labelledby="navbarDropdown">
                                            <li class="dropdown-item"><a href="{{ url('/article/add') }}">Add article</a></li>
                                            <li class="dropdown-item"><a href="{{ url('/profile') }}">Profile</a></li>
                                            <?php $role = Auth::user()->role_id ?>
                                            @if($role == 1)
                                                <li class="dropdown-item"><a href="{{ url('/admin/dashboard') }}">Admin Panel</a></li>
                                            @endif
                                            <li class="dropdown-item">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log out</a>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link px-lg-3 py-3 py-lg-4">Log in</a></li>
                                    @if (Route::has('register'))
                                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link px-lg-3 py-3 py-lg-4">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid bg-white py-5 mt-3">
            <div class="container px-4 px-lg-5">
                @yield('content')
            </div>
        </div>    

        <div>
            @include('layouts.homesite.home-footer')
        </div>



        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts-home.js') }}"></script>
    </body>
</html>
