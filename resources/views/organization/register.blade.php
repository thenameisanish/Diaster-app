@extends('layouts.app')

@section('title', 'Organization Registration')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow border-0">

                <div class="card-body p-5">

                    <h2 class="text-center fw-bold mb-3">
                        Organization Registration
                    </h2>

                    <p class="text-center text-muted">
                        Step 1 of 5 - Basic Information
                    </p>

                    <div class="progress mb-5" style="height:12px;">

                        <div class="progress-bar bg-success"
                             role="progressbar"
                             style="width:20%">
                        </div>

                    </div>

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form method="POST"
                          action="{{ route('organization.store') }}"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-building"></i>

                                    Organization Name

                                </label>

                                <input
                                    type="text"
                                    name="organization_name"
                                    class="form-control"
                                    value="{{ old('organization_name') }}"
                                    required>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-hash"></i>

                                    Registration Number

                                </label>

                                <input
                                    type="text"
                                    name="registration_number"
                                    class="form-control"
                                    value="{{ old('registration_number') }}"
                                    required>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-diagram-3"></i>

                                    Organization Type

                                </label>

                                <select
                                    name="organization_type"
                                    class="form-select"
                                    required>

                                    <option value="">
                                        Select Type
                                    </option>

                                    <option>NGO</option>
                                    <option>INGO</option>
                                    <option>Government</option>
                                    <option>Charity</option>
                                    <option>Community</option>
                                    <option>Other</option>

                                </select>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-calendar"></i>

                                    Years of Operation

                                </label>

                                <input
                                    type="number"
                                    name="years_of_operation"
                                    class="form-control"
                                    min="0"
                                    value="{{ old('years_of_operation') }}"
                                    required>

                            </div>

                            <div class="col-12 mb-4">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-card-text"></i>

                                    Organization Description

                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control">{{ old('description') }}</textarea>

                            </div>

                            <div class="col-12 mb-4">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-image"></i>

                                    Organization Logo

                                </label>

                                <input
                                    type="file"
                                    name="logo"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="text-end">

                            <button
                                class="btn btn-primary btn-lg">

                                Next

                                <i class="bi bi-arrow-right"></i>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection