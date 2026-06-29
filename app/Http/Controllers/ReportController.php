<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\MedicalRecord;
use App\Models\Appointment;

class ReportController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {

            $totalPatients = Patient::count();

            $totalRecords = MedicalRecord::count();

            $totalAppointments = Appointment::count();

            $recentRecords = MedicalRecord::with(['patient.user'])
                ->latest()
                ->take(5)
                ->get();

        } else {

            $totalPatients = Patient::where('user_id', auth()->id())->count();

            $totalRecords = MedicalRecord::whereHas('patient', function ($query) {
                $query->where('user_id', auth()->id());
            })->count();

            $totalAppointments = Appointment::whereHas('patient', function ($query) {
                $query->where('user_id', auth()->id());
            })->count();

            $recentRecords = MedicalRecord::with('patient')
                ->whereHas('patient', function ($query) {
                    $query->where('user_id', auth()->id());
                })
                ->latest()
                ->take(5)
                ->get();

        }

        return view('reports.index', compact(
            'totalPatients',
            'totalRecords',
            'totalAppointments',
            'recentRecords'
        ));
    }
}