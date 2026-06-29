<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
   protected $fillable = [
        'user_id',
        'hospital_no',
        'fullname',
        'gender',
        'date_of_birth',
        'phone',
        'address'
    ];

    public function appointments()
{
    return $this->hasMany(Appointment::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

    public function medicalRecords()
{
    return $this->hasMany(MedicalRecord::class);
}
}
