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
                <li class="nav-item dropdown" style=" list-style-type: none;">

                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="rounded-circle me-2" style="width: 32px; height: 32px;"
                            src="https://ruffianazzahri.github.io/portfolio/img/profile-pics.jpg" alt="Profile Picture">

                        <span>Welcome, {{ session('userName', Auth::user()->name) }}!</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ url('/studentprofile') }}" class="dropdown-item" role="menuitem" tabindex="-1"
                                id="user-menu-item-0"><i class="fa-solid fa-user"></i> Profil Anda</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ url('/logout') }}" tabindex="-1" id="user-menu-item-2"><i
                                    class="fa-solid fa-right-from-bracket"></i> Keluar</a></li>
                    </ul>
                </li>
                <div class="mx-auto"></div>
                <div class="navbar-nav">

                    @if (Route::has('login'))
                    @auth
                    <!-- Profile dropdown -->
                    <a class="nav-link " href="{{route('home')}}"><i class="fa-solid fa-house"></i> Beranda</a>
                    <a class="nav-link " href="{{route('aboutus')}}"><i class="fa-solid fa-circle-info"></i> Tentang
                        Kami</a>
                    <a class="nav-link " href="{{route('activity')}}"><i class="fa-solid fa-list"></i>
                        Aktivitas</a>
                    <a class="nav-link " href="{{route('students')}}"><i class="fa-solid fa-users"></i> Calon
                        Peserta</a>
                    <a class="nav-link" href="{{ route('createstudent') }}" style="color: blue;"><i
                            class="fa fa-plus"></i>
                        Daftar
                        Ekskul!</a>




                    @else
                    <a class="nav-link " href="{{route('home')}}"><i class="fa-solid fa-house"></i> Beranda</a>
                    <a class="nav-link " href="{{route('aboutus')}}"><i class="fa-solid fa-circle-info"></i> Tentang
                        Kami</a>
                    <a class="btn btn-primary" style="margin-left: 5px;" href="{{route('login')}}">Login</a>

                    @if (Route::has('register'))
                    <a class="btn btn-primary" style="margin-left: 5px;" href="{{route('register')}}">Daftar Akun</a>

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

    <!-- Footer -->
    <footer class="text-center text-white text-lg-start bg-primary" style="margin-top: 200px">
        <div class="container d-flex justify-content-center py-4">
            <p>SIGMA Academy - Menjadi entepreneur yang mendunia, membumi, dan mengluar-angkasa</p>
        </div>

        <!-- Copyright -->
        <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.1);">
            © <script>
            document.write(new Date().getFullYear())
            </script>
            <a>Muhammad Ruffian Azzahri</a>

        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    </section>

    </div>

    </footer>

</body>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('fontawesome/js/fontawesome.js') }}"></script>
<script src="{{ asset('fontawesome/js/solid.js') }}"></script>
<script src="{{ asset('jquery/jquery.js') }}"></script>
<script src="{{ asset('jspdf/dist/jspdf.umd.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function edit() {
    console.log('test');
    document.getElementById("editButton").style.display = "none";
    document.getElementById("saveCancelButtons").style.display = "flex";
    document.getElementById("name").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("password").disabled = false;
}

function cancelEditButton() {
    document.getElementById("editButton").style.display = "block";
    document.getElementById("saveCancelButtons").style.display = "none";
    document.getElementById("name").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("password").disabled = true;
}
</script>







</html>
