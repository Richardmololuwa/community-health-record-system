@extends('layouts.app')

@section('content')



<div class="d-flex justify-content-between mb-3">

<h2>Patients</h2>

<a href="{{ route('patients.create') }}"
class="btn btn-primary">
Add Patient
</a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif


<form method="GET" action="{{ route('patients.index') }}" class="row mb-3">

    <div class="col-md-6">

        <input
            type="text"
            name="search"
            class="form-control shadow-sm"
            placeholder="Search by name, hospital number or phone..."
            value="{{ $search }}">

    </div>

    <div class="d-flex justify-content-end gap-2 mt-3">

    <button class="btn btn-primary px-4">
        <i class="bi bi-search"></i>
        Search
    </button>

    <button class="btn btn-secondary px-4">
        <i class="bi bi-arrow-clockwise"></i>
        Reset
    </button>

</div>

</form>

<div class="card shadow-sm border-0">

<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-hover">
<thead>

<tr>
<th>Hospital No</th>
<th>Name</th>
<th>Gender</th>
<th>Phone</th>
@if(auth()->user()->isAdmin())
<th>Doctor</th>
@endif
<th>Actions</th>
</tr>

</thead>

<tbody>

@foreach($patients as $patient)

<tr>
<td>{{ $patient->hospital_no }}</td>
<td>{{ $patient->fullname }}</td>
<td>{{ $patient->gender }}</td>
<td>{{ $patient->phone }}</td>
@if(auth()->user()->isAdmin())
    <td>{{ $patient->user->name }}</td>
@endif

<td>

<div class="d-flex flex-column flex-md-row gap-2">

<a href="{{ route('patients.show', $patient) }}"
   class="btn btn-info btn-sm">

    View

</a>
<a href="{{ route('patients.edit', $patient) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form action="{{ route('patients.destroy', $patient) }}"
      method="POST"
      style="display:inline;">

    @csrf

    @method('DELETE')

    <button
        class="btn btn-danger btn-sm"
        onclick="return confirm('Are you sure you want to delete this patient?')">

        Delete

    </button>

</form>

</td>

</div>

</tr>

@endforeach

</tbody>

</table>


</div>

</div>

</div>


@endsection