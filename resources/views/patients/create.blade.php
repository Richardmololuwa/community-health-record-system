@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Add Patient</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('patients.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Hospital Number</label>
                <input
                    type="text"
                    name="hospital_no"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Full Name</label>
                <input
                    type="text"
                    name="fullname"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Gender</label>

                <select
                    name="gender"
                    class="form-select">

                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                </select>
            </div>

            <div class="mb-3">
                <label>Date of Birth</label>

                <input
                    type="date"
                    name="date_of_birth"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Phone</label>

                <input
                    type="text"
                    name="phone"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Address</label>

                <textarea
                    name="address"
                    class="form-control"></textarea>
            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Save Patient

            </button>

        </form>

    </div>

</div>

@endsection