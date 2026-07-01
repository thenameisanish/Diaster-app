@extends('layouts.app')

@section('title','Organization Registration')

@section('content')

<div class="row justify-content-center">

<div class="col-lg-9">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3 class="mb-0">
Organization Registration
</h3>

</div>

<div class="card-body">

<form method="POST"
      action="{{ route('organization.store') }}"
      enctype="multipart/form-data">

@csrf

<h5 class="mb-3">
Basic Information
</h5>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">
Organization Name
</label>

<input
type="text"
name="organization_name"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
Registration Number
</label>

<input
type="text"
name="registration_number"
class="form-control"
required>

</div>

</div>

<div class="mb-3">

<label class="form-label">
Organization Type
</label>

<select
name="organization_type"
class="form-select"
required>

<option value="">Choose...</option>

<option>NGO</option>

<option>INGO</option>

<option>Government</option>

<option>Charity</option>

<option>Community</option>

<option>Other</option>

</select>

</div>

<button
class="btn btn-primary">

Continue

</button>

</form>

</div>

</div>

</div>

</div>

@endsection