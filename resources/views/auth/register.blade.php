<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register - Sigma Academy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/solid.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
</head>
<style>
body {

    background-image: url('assets/building.jpg');

    background-position: center center;

    background-repeat: no-repeat;

    background-attachment: fixed;
    background-size: cover;
    background-color: #464646;

}

/* For mobile devices */
@media only screen and (max-width: 767px) {
    body {

        background-image: url('assets/building.jpg');
    }
}
</style>

<body>
    <div class="container">
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <div class="card" style="width: 50%">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/logo.png') }}" class="img-fluid mt-1" style="width: 200px">
                        <h1 class="lead mt-3" style="font-size: 28px">
                            Halaman Registrasi
                        </h1>
                    </div>

                    <form action="{{ route('register.save') }}" method="POST" class="mt-5">
                        @csrf
                        <div class="mt-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama" required>
                            @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="name@email.com" required>
                            @error('email')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="password">Kata sandi</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="form-control" required>
                            @error('password')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="confirm-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                kata sandi anda</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••" class="form-control" required>
                            @error('password_confirmation')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-start mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Saya menyetujui<a href="https://generator.lorem-ipsum.info/terms-and-conditions"
                                        target="_blank"> Persetujuan atas <span style="font-style: italic;">term dan
                                            conditions yang berlaku</span></a>
                                </label>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-block btn-success"><i
                                    class="fa-solid fa-right-to-bracket"></i>
                                Buat Akun</button>
                            <p>
                                Sudah punya akun? <a href=" {{ route('login') }}">Login disini</a>
                            </p>
                            © <script>
                            document.write(new Date().getFullYear())
                            </script> Developed with proud by Muhammad Ruffian Azzahri
                            <!-- <p>
                                Kembali ke <a href="{{ route('home') }}">Beranda</a>
                            </p> -->
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
</body>

</html>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<s src="{{ asset('fontawesome/js/fontawesome.js') }}"></s cript>
<script src="{{ asset('fontawesome/js/solid.js') }}"></script>
