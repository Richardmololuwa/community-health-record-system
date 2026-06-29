<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;


class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if(auth()->user()->isAdmin()){

        $records = MedicalRecord::with(['patient.user'])->get();

    }else{

        $records = MedicalRecord::with('patient')
            ->whereHas('patient', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();

    }

    return view('medical-records.index', compact('records'));
}



      /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            $patients = Patient::where('user_id', auth()->id())->get();
            return view(
                'medical-records.create',
                compact('patients')
            );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'visit_date' => 'required|date',
            'diagnosis' => 'required',
            'treatment' => 'required',
        ]);

        MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'visit_date' => $request->visit_date,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
        ]);

        return redirect()->route('medical-records.index')
            ->with('success', 'Medical record added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        //
    }
}
