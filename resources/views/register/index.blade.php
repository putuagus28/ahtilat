<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    {{-- Login Local Bootstrap --}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom Registration CSS --}}
    <link href="/css/registration.css" rel="stylesheet">
</head>

<body>

    <main class="form-registration w-100 m-auto">
        <form action="/register" method="post">
            @csrf
            {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>

            <div class="form-floating">
                <input type="text" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Name">
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    placeholder="Username">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        </form>
        <small class="d-block text-center mt-3">
            Already registered? <a href="/login">Login</a>
        </small>
    </main>



</body>

</html>
