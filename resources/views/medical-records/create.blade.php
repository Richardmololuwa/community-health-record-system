@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Add Medical Record</h4>
    </div>

    <div class="card-body">

    <form action="{{ route('medical-records.store') }}" method="POST">
        @csrf

        <div class="mb-3">
        <label>Patient</label>

        <select
            name="patient_id"
            class="form-select">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">
                        {{ $patient->fullname }}
                    </option>
                @endforeach
            </select>
        </div>

            <br><br>

        <div class="mb-3">    
            <label>Diagnosis</label>
        <textarea
            name="diagnosis"
            class="form-control"
            rows="4"
            required></textarea>

        </div>

            <br><br>    
        <br><br>


        <div class="mb-3">

            <label>Treatment</label>
        <textarea
            name="treatment"
            class="form-control"
            rows="4"
            required></textarea>

        </div>

        <br><br>


        <div class="mb-3">
            <label>Visit Date</label>
        <input
            type="date"
            name="visit_date"
            class="form-control"
            required>

                <button
         type="submit"
                
            class="btn btn-success">
                    Save Record
            </button>


        </div>    
        </form>

  </div>

</div>



@endsection