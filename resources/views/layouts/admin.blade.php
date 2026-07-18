<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container-fluid">

<div class="row">

<!-- Sidebar -->

<div class="col-md-2 bg-dark text-white min-vh-100">

<h3 class="mt-4 text-center">
Disaster Relief
</h3>

<hr>

<ul class="nav flex-column">

<li class="nav-item mb-2">
<a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
<i class="bi bi-speedometer2"></i>
Dashboard
</a>
</li>

<li class="nav-item mb-2">
<a href="{{ route('admin.organizations') }}" class="nav-link text-white">
<i class="bi bi-building"></i>
Organizations
</a>
</li>

<li class="nav-item mb-2">
<a href="#" class="nav-link text-white">
<i class="bi bi-exclamation-triangle"></i>
Disaster Reports
</a>
</li>

<li class="nav-item mb-2">
<a href="#" class="nav-link text-white">
<i class="bi bi-box-seam"></i>
Resources
</a>
</li>

<li class="nav-item mb-2">
<a href="#" class="nav-link text-white">
<i class="bi bi-house"></i>
Shelters
</a>
</li>

<li class="nav-item mb-2">
<a href="#" class="nav-link text-white">
<i class="bi bi-people"></i>
Users
</a>
</li>

<li class="nav-item mb-2">
<a href="#" class="nav-link text-white">
<i class="bi bi-graph-up"></i>
Reports
</a>
</li>

</ul>

</div>

<!-- Content -->

<div class="col-md-10">

<nav class="navbar bg-white shadow-sm">

<div class="container-fluid">

<span class="navbar-brand">

@yield('title')

</span>

<div>

{{ auth()->user()->name }}

</div>

</div>

</nav>

<div class="p-4">

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

@yield('content')

</div>

</div>

</div>

</div>

</body>
</html>