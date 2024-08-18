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
    <link rel="stylesheet" href="{{ asset('datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{ url('/admin/home') }}">
                        <img src="{{ asset('assets/logo.png') }}" class="img-fluid mt-1" style="width: 200px">
                    </a>
                </li>

                @if (Route::has('login'))
                @auth


                <li class="mt-3 mb-3">

                    <img class="rounded-circle me-2" style="width: 32px; height: 32px;"
                        src="https://ruffianazzahri.github.io/portfolio/img/profile-pics.jpg" alt="Profile Picture">
                    <span>{{ session('userName', Auth::user()->name) }}</span>

                </li>

                <li><a href="{{ url('/admin/home') }}" class="dropdown-item" role="menuitem" tabindex="-1"
                        id="user-menu-item-0"><i class="fa fa-house"></i> Beranda</a></li>
                <li>
                <li><a href="{{ url('/admin/students') }}" class="dropdown-item" role="menuitem" tabindex="-1"
                        id="user-menu-item-0"><i class="fa-solid fa-users"></i> Calon Peserta</a></li>
                <li>
                <li><a href="{{ url('/admin/activity') }}" class="dropdown-item" role="menuitem" tabindex="-1"
                        id="user-menu-item-0"><i class="fa-solid fa-list"></i> Daftar kegiatan ekskul</a></li>
                <li>
                <li><a href="{{ url('/admin/profile') }}" class="dropdown-item" role="menuitem" tabindex="-1"
                        id="user-menu-item-0"><i class="fa fa-user"></i> Manajemen Akun</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ url('/logout') }}" tabindex="-1" id="user-menu-item-2">
                        <i class="fa fa-sign-out"></i> Keluar</a></li>

                </li>


                @else
                <li>
                    <a class="nav-link " href="{{route('home')}}"><i class="fa-solid fa-house"></i> Beranda</a>
                </li>
                <li>
                    <a class="nav-link " href="{{route('aboutus')}}">Tentang Kami</a>
                </li>
                <li>
                    <a class="btn btn-primary" style="margin-left: 5px;" href="{{route('login')}}">Masuk</a>
                </li>




                @if (Route::has('register'))

                <li>
                    <a class="btn btn-primary" style="margin-left: 5px;" href="{{route('register')}}">Register</a>
                </li>

                @endif
                @endauth
                @endif

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container">
                <div>@yield('contents')</div>
            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>
<script src="{{ asset('jquery/jquery.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('fontawesome/js/fontawesome.js') }}"></script>
<script src="{{ asset('fontawesome/js/solid.js') }}"></script>
<script src="{{ asset('datatables/datatables.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
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
<script>
$(document).ready(function() {
    $('#activity-table').DataTable();
});
</script>
<script>
$(document).ready(function() {
    $('#students-table').DataTable();
});
</script>

</html>