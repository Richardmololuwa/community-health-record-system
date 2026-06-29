@extends('layouts.app')

@section('content')


<div class="alert alert-success">

    Healthcare Statistics Report

</div>

<h2 class="mb-4">
Reports Dashboard
</h2>

<div class="row">

<div class="col-md-4">

<div class="card shadow-sm">

<div class="card-body">

<h5>Total Patients</h5>

<h1>{{ $totalPatients }}</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow-sm">

<div class="card-body">

<h5>Total Records</h5>

<h1>{{ $totalRecords }}</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow-sm">

<div class="card-body">

<h5>Total Appointments</h5>

<h1>{{ $totalAppointments }}</h1>

</div>

</div>

</div>

</div>

<hr>

<h4>Recent Medical Records</h4>

<div class="card shadow-sm border-0">

<div class="card-body">

<div class="table-responsive">

<table class="table table-striped">

<thead>

<tr>
    <th>Patient</th>
    <th>Diagnosis</th>
    <th>Visit Date</th>
    @if(auth()->user()->isAdmin())
    <th>Doctor</th>
    @endif
</tr>

</thead>

<tbody>

@foreach($recentRecords as $record)

<tr>
    <td>{{ $record->patient->fullname }}</td>
    <td>{{ $record->diagnosis }}</td>
    <td>{{ $record->visit_date }}</td>
    @if(auth()->user()->isAdmin())
    <td>{{ $record->patient->user->name }}</td>
    @endif
</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

@endsection