@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<div class="text-center">

    <h1 class="display-4 fw-bold">
        Disaster Relief Resource Management System
    </h1>

    <p class="lead mt-3">
        Connecting citizens, relief organizations, and administrators during emergencies.
    </p>

    <div class="mt-5">

        <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">
            Login
        </a>

        <a href="{{ route('register') }}" class="btn btn-success btn-lg me-2">
            Citizen Register
        </a>

        <a href="{{ route('organization.register') }}" class="btn btn-warning btn-lg">
            Register Organization
        </a>

    </div>

</div>

@endsection