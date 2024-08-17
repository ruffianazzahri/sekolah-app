<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - Sigma Academy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/solid.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
</head>

<body>
    <div class="container">

        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <div class="card" style="width: 50%">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/logo.png') }}" class="img-fluid mt-1" style="width: 300px">
                        <h1 class="lead mt-3" style="font-size: 28px">
                            Login Page
                        </h1>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li><span class="block sm:inline">{{ $error }}</span></li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>
                    @endif
                    <form action="{{ route('login.action') }}" method="POST" class="mt-5">
                        @csrf

                        <div class="mt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="name@email.com" required>
                            @error('email')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="form-control" required>
                            @error('password')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input name="remember" id="remember" aria-describedby="remember" type="checkbox">
                            <label for="remember">Remember me</label>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-block btn-success"><i
                                    class="fa-solid fa-right-to-bracket"></i> Login</button>
                            <p>
                                Don't have an account? <a href="{{ route('register') }}">Register a new account here</a>
                            </p>
                            <p>
                                Back to <a href="{{ route('home') }}">Homepage</a>
                            </p>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
</body>

</html>




<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('fontawesome/js/fontawesome.js') }}"></script>
<script src="{{ asset('fontawesome/js/solid.js') }}"></script>