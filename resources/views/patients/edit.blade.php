@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Edit Patient</h4>

    </div>

    <div class="card-body">

<form action="{{ route('patients.update', $patient) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Hospital Number</label>

<input
type="text"
name="hospital_no"
class="form-control"
value="{{ $patient->hospital_no }}">

</div>

<div class="mb-3">

<label>Full Name</label>

<input
type="text"
name="fullname"
class="form-control"
value="{{ $patient->fullname }}">

</div>

<div class="mb-3">

<label>Gender</label>

<select
name="gender"
class="form-select">

<option {{ $patient->gender=='Male'?'selected':'' }}>
Male
</option>

<option {{ $patient->gender=='Female'?'selected':'' }}>
Female
</option>

</select>

</div>

<div class="mb-3">

<label>Date of Birth</label>

<input
type="date"
name="date_of_birth"
class="form-control"
value="{{ $patient->date_of_birth }}">

</div>

<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="{{ $patient->phone }}">

</div>

<div class="mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control">{{ $patient->address }}</textarea>

</div>

<button class="btn btn-warning">

Update Patient

</button>

</form>

</div>

</div>

@endsection