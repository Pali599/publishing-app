<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }}">EasyPublish</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('home/about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.html">Contact</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.html">Add article</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/profile') }}">Profile</a></li>
                        <?php $role = Auth::user()->role ?>
                        @if($role == 1)
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <li class="nav-item"><a :href="route('logout')" class="nav-link px-lg-3 py-3 py-lg-4" onclick="event.preventDefault(); this.closest('form').submit();">Log out</a></li>
                        </form>
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