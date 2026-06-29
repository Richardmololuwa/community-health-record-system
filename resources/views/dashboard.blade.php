@extends('layouts.app')

@section('content')

<div class="alert alert-primary shadow-sm">

    <h3>🏥 Community Health Record System</h3>

    <p class="mb-0">
        Digital patient management and healthcare record tracking platform.
    </p>

</div>

<div class="alert alert-primary">

    <p>
    Today's Date:
    {{ now()->format('d M Y') }}
    </p>
    <h3>
        Welcome to Community Health Record System
    </h3>

    <p>
        Manage patients, appointments and medical records efficiently.
    </p>

</div>

<div class="row">

<div class="col-md-4 mb-3">
    <div class="card text-white mb-3" style="background:linear-gradient(45deg,#0d6efd,#4e9eff);">
        <div class="card-body text-center">
            <h5>Total Patients</h5>
            <h1>{{ $patients }}</h1>
        </div>
    </div>
</div>

<div class="col-md-4 mb-3">
    <div class="card text-white mb-3" style="background:linear-gradient(45deg,#198754,#57cc99);">
    <div class="card-body text-center">
        <h5>Medical Records</h5>
        <h1>{{ $records }}</h1>
    </div>
</div>
</div>

<div class="col-md-4 mb-3">
    <div class="card text-white mb-3" style="background:linear-gradient(45deg,#fd7e14,#ffb84d);">
    <div class="card-body text-center">
        <h5>Appointments</h5>
        <h1>{{ $appointments }}</h1>
    </div>
</div>
</div>



<div class="card mt-4">
    <div class="card-header">
        Recent Activity
    </div>

    <div class="card-body">
        <ul class="list-group list-group-flush">

            <li class="list-group-item">
                ✔ Patients Registered: {{ $patients }}
            </li>

            <li class="list-group-item">
                ✔ Medical Records Created: {{ $records }}
            </li>

            <li class="list-group-item">
                ✔ Appointments Scheduled: {{ $appointments }}
            </li>

        </ul>
    </div>
</div>

</div>
<hr>




@endsection