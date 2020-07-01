<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'patient_id', 'doctor_fees', 'designation_name', 'status',
        'doctor_name', 'doctor_time', 'doctor_day', 'booking_date', 'time_choosen',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor', 'doctor_name','id');
    }

    public function patient()
    {
        return $this->belongsTo("App\Patient", 'patient_id','id');
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation', 'designation_name', 'id');
    }


}
