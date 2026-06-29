@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Medical Records</h2>

    <a href="{{ route('medical-records.create') }}"
       class="btn btn-primary">

       Add Record

    </a>

</div>

<div class="card shadow-sm border-0">

<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-hover">

<thead>

<tr>
    <th>Patient</th>
    <th>Diagnosis</th>
    <th>Treatment</th>
    <th>Visit Date</th>
</tr>

</thead>

<tbody>

@foreach($records as $record)

<tr>
    <td>{{ $record->patient->fullname }}</td>
    <td>{{ $record->diagnosis }}</td>
    <td>{{ $record->treatment }}</td>
    <td>{{ $record->visit_date }}</td>
</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>


@endsection