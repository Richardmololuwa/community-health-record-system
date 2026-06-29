<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    if(auth()->user()->isAdmin()){

        $appointments = Appointment::with(['patient.user'])->get();

    }else{

        $appointments = Appointment::with('patient')
            ->whereHas('patient', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();

    }

    return view('appointments.index', compact('appointments'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $patients = Patient::where('user_id', auth()->id())->get();
    return view('appointments.create', compact('patients'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    Appointment::create($request->all());

    return redirect()->route('appointments.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
