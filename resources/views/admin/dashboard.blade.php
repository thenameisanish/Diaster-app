@extends('layouts.admin')

@section('title','Admin Dashboard')

@section('content')

<div class="container">

    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">

        <div class="col-md-4">

            <div class="card text-bg-warning mb-3">

                <div class="card-body">

                    <h5>Pending Organizations</h5>

                    <h2>{{ $pendingOrganizations }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card text-bg-success mb-3">

                <div class="card-body">

                    <h5>Approved Organizations</h5>

                    <h2>{{ $approvedOrganizations }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card text-bg-danger mb-3">

                <div class="card-body">

                    <h5>Rejected Organizations</h5>

                    <h2>{{ $rejectedOrganizations }}</h2>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection