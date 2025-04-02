<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */

    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'specialization_id', 'bio', 'experience_years',
        'price_per_appointment', 'available_days', 'working_hours', 
        'image', 'doctor_document', 'governorate', 'address', 'status'
    ];

    // A doctor belongs to a specialization
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    // A doctor has many appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }



}
