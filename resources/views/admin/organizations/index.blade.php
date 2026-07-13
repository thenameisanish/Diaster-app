@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Organizations</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Organization</th>
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
                    <td>{{ $organization->status }}</td>
                    <td>
                        <a href="{{ route('admin.organization.show', $organization) }}"
                           class="btn btn-primary btn-sm">
                            View
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No organizations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $organizations->links() }}
</div>
@endsection