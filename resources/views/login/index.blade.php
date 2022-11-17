<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Pilar Kreatif Teknologi | Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    {{-- Login Local Bootstrap --}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom Login CSS --}}
    <link href="/css/login.css" rel="stylesheet">
</head>

<body>
    <main class="form-signin w-100 m-auto">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="/login" method="POST">
            @csrf
            <img class="mb-4" src="" alt="Logo Pilar Kreatif Teknologi" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal text-center">Pilar Kreatif Teknologi</h1>

            <div class="form-floating">
                <input type="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    placeholder="name@example.com">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
        </form>
        <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
    </main>



</body>

</html>
