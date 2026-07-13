@extends('layouts.app')

@section('content')

<div class="container">

<h2 class="mb-4">Organizations</h2>

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Name</th>
<th>Type</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($organizations as $organization)

<tr>

<td>{{ $organization->id }}</td>

<td>{{ $organization->organization_name }}</td>

<td>{{ $organization->organization_type }}</td>

<td>

<span class="badge bg-warning">

{{ $organization->status }}

</span>

</td>

<td>

<a href="{{ route('admin.organization.show',$organization) }}"
class="btn btn-primary btn-sm">

View

</a>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center">

No organizations found.

</td>

</tr>

@endforelse

</tbody>

</table>

{{ $organizations->links() }}

</div>

@endsection