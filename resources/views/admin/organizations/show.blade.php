@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>{{ $organization->organization_name }}</h2>

    <p><strong>Status:</strong> {{ $organization->status }}</p>
    <p><strong>Email:</strong> {{ $organization->email }}</p>
    <p><strong>Phone:</strong> {{ $organization->phone }}</p>
</div>
@endsection