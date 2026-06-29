@extends('layouts.app')

@section('content')




<div class="card">

<div class="card-header">
    <h2>Schedule Appointment</h2>
    </div>

    <div class="card-body">
<form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <div class="mb-3">
    <label>Patient</label>

    <select class="form-select" name="patient_id">
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}">
                {{ $patient->fullname }}
            </option>
        @endforeach
    </select>

    </div>


    <div class="mb-3">
    <label>Appointment Date</label>
    <input class="form-control" type="date" name="appointment_date">

    </div>
  
    <div class="mb-3">
    <label>Status</label>

    <select class="form-select" name="status">
        <option value="Pending">Pending</option>
        <option value="Completed">Completed</option>
        <option value="Cancelled">Cancelled</option>
    </select>

    </div>



    <div class="mb-3">
    <button class="btn btn-primary" type="submit">
        Save Appointment
    </button>

    </div>
</form>

</div>

</div>

@endsection