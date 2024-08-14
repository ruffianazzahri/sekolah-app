<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo.png') }}" class="img-fluid mt-1" style="width: 200px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="mx-auto"></div>
                <div class="navbar-nav">

                    @if (Route::has('login'))
                    @auth
                    <!-- Profile dropdown -->
                    <a class="nav-link " href="{{route('home')}}">Home</a>
                    <a class="nav-link " href="{{route('aboutus')}}">About Us</a>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="rounded-circle me-2" style="width: 32px; height: 32px;"
                                src="https://ruffianazzahri.github.io/portfolio/img/profile-pics.jpg"
                                alt="Profile Picture">

                            <span>Welcome, {{ session('userName', Auth::user()->name) }}!</span>
                        </a>





                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{ url('/profile') }}" class="dropdown-item" role="menuitem" tabindex="-1"
                                    id="user-menu-item-0">Your Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/logout') }}" tabindex="-1"
                                    id="user-menu-item-2">Sign out</a></li>
                        </ul>
                    </li>


                    @else
                    <a class="nav-link " href="{{route('home')}}">Home</a>
                    <a class="nav-link " href="{{route('aboutus')}}">About Us</a>
                    <a class="btn btn-primary" style="margin-left: 5px;" href="{{route('login')}}">Login</a>

                    @if (Route::has('register'))
                    <a class="btn btn-primary" style="margin-left: 5px;" href="{{route('register')}}">Register</a>

                    @endif
                    @endauth
                    @endif

                </div>

            </div>

        </div>
    </nav>

    <div class="container">
        <div>@yield('contents')</div>
    </div>
</body>

</html>




<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<s src="{{ asset('fontawesome/js/fontawesome.js') }}"></s cript>
< src="{{ asset('fontawesome/js/solid.js') }}"></ script>
<script src="{{ asset('jquery/jquery.js') }}"></script>
