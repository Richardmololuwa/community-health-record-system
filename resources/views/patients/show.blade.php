@extends('layouts.app')

@section('content')

<h2 class="mb-4">Patient Profile</h2>

<div class="card shadow mb-4">

    <div class="card-header bg-primary text-white">
        Patient Information
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <p><strong>Hospital Number:</strong> {{ $patient->hospital_no }}</p>

                <p><strong>Full Name:</strong> {{ $patient->fullname }}</p>

                <p><strong>Gender:</strong> {{ $patient->gender }}</p>

            </div>

            <div class="col-md-6">

                <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth }}</p>

                <p><strong>Phone:</strong> {{ $patient->phone }}</p>

                <p><strong>Address:</strong> {{ $patient->address }}</p>

            </div>

        </div>

    </div>

</div>

<div class="card shadow mb-4">

    <div class="card-header bg-success text-white">

        Medical History

    </div>

    <div class="card-body">

        @if($patient->medicalRecords->count())

            <table class="table table-bordered">

                <thead>

                <tr>

                    <th>Diagnosis</th>

                    <th>Treatment</th>

                    <th>Visit Date</th>

                </tr>

                </thead>

                <tbody>

                @foreach($patient->medicalRecords as $record)

                    <tr>

                        <td>{{ $record->diagnosis }}</td>

                        <td>{{ $record->treatment }}</td>

                        <td>{{ $record->visit_date }}</td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        @else

            <div class="alert alert-warning">

                No medical records found.

            </div>

        @endif

    </div>

</div>

<div class="card shadow">

    <div class="card-header bg-info text-white">

        Appointments

    </div>

    <div class="card-body">

        @if($patient->appointments->count())

            <table class="table table-bordered">

                <thead>

                <tr>

                    <th>Date</th>

                    <th>Status</th>

                </tr>

                </thead>

                <tbody>

                @foreach($patient->appointments as $appointment)

                    <tr>

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

        @else

            <div class="alert alert-warning">

                No appointments scheduled.

            </div>

        @endif

    </div>

</div>

<br>

<a href="{{ route('patients.index') }}" class="btn btn-secondary">

← Back to Patients

</a>

@endsection