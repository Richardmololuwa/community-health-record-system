<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    if(auth()->user()->isAdmin()){

        $patients = Patient::with('user')
            ->when($search,function($query) use($search){

                $query->where(function($q) use($search){

                    $q->where('fullname','LIKE',"%{$search}%")
                      ->orWhere('hospital_no','LIKE',"%{$search}%")
                      ->orWhere('phone','LIKE',"%{$search}%");

                });

            })
            ->get();

    }else{    

    $patients = Patient::where('user_id',auth()->id())
        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('fullname', 'LIKE', "%{$search}%")
                  ->orWhere('hospital_no', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%");

            });

        })
        ->get();

    }

    return view('patients.index', compact('patients', 'search'));
}

    public function create()
    {
        return view('patients.create');
    }

    public function edit(Patient $patient)
    {
if (!auth()->user()->isAdmin()) {
    abort_if($patient->user_id !== auth()->id(), 403);
}
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
if (!auth()->user()->isAdmin()) {
    abort_if($patient->user_id !== auth()->id(), 403);
}
        $patient->update([

            'hospital_no' => $request->hospital_no,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);

        return redirect()
                ->route('patients.index')
                ->with('success', 'Patient updated successfully.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'hospital_no' => 'required|unique:patients',
            'fullname' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Patient::create([
            'user_id' => auth()->id(),
            'hospital_no' => $request->hospital_no,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('patients.index')
            ->with('success', 'Patient added successfully');
    }
    public function show(Patient $patient)
{
    if (!auth()->user()->isAdmin()) {
        abort_if($patient->user_id !== auth()->id(), 403);
    }

    $patient->load([
        'medicalRecords',
        'appointments'
    ]);

    return view('patients.show', compact('patient'));
}
    public function destroy(Patient $patient)
    {
if (!auth()->user()->isAdmin()) {
    abort_if($patient->user_id !== auth()->id(), 403);
}
        $patient->delete();

        return redirect()
                ->route('patients.index')
                ->with('success', 'Patient deleted successfully.');
    }
}