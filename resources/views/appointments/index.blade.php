
<@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Appointments</h2>

    <a href="{{ route('appointments.create') }}"
       class="btn btn-primary">

       Schedule Appointment

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card shadow-sm border-0">

<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-hover">

<thead>

<tr>
    <th>Patient</th>
    <th>Date</th>
    <th>Status</th>
</tr>

</thead>

<tbody>

@foreach($appointments as $appointment)

<tr>
    <td>{{ $appointment->patient->fullname }}</td>
    <td>{{ $appointment->appointment_date }}</td>
    <td>
    @if($appointment->status == 'Completed')
        <span class="badge bg-success">Completed</span>

    @elseif($appointment->status == 'Pending')
        <span class="badge bg-warning text-dark">Pending</span>

    @elseif($appointment->status == 'Cancelled')
        <span class="badge bg-danger">Cancelled</span>

    @else
        <span class="badge bg-secondary">
            {{ $appointment->status }}
        </span>
    @endif
</td>
</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

@endsection