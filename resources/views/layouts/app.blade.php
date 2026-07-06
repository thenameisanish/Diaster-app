<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Disaster Relief Resource Management System')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            Disaster Relief
        </a>

        <div>

            <a href="/" class="btn btn-outline-light me-2">
                Home
            </a>

            <a href="{{ route('login') }}" class="btn btn-light me-2">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-warning">
                User Register
            </a>

        </div>

    </div>
</nav>

<div class="container mt-5">
    @if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

    @yield('content')

</div>

</body>
</html>