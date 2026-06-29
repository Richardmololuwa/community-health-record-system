<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->isAdmin()){

            $patients = Patient::count();

            $records = MedicalRecord::count();

            $appointments = Appointment::count();

        }else{

            $patients = Patient::where('user_id',auth()->id())->count();

            $records = MedicalRecord::whereHas('patient',function($q){
                $q->where('user_id',auth()->id());
            })->count();

            $appointments = Appointment::whereHas('patient',function($q){
                $q->where('user_id',auth()->id());
            })->count();

        }

        return view('dashboard',compact(
            'patients',
            'records',
            'appointments'
        ));
    }
}