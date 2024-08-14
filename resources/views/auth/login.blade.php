<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <div class="card" style="width: 50%">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/logo.png') }}" class="img-fluid mt-1" style="width: 200px">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login Page
                        </h1>
                    </div>

                    <form action="{{ route('login.action') }}" method="POST" class="mt-5">
                        @csrf
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
                            <button type="submit" class="btn btn-block btn-success">Login</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don't have an account? <a href="{{ route('register') }}">Register a new account here</a>
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