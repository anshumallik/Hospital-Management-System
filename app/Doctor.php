<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'fee',
        'image',
        'designation_id',
        'day',
        'time',
    ];

    public function designation()
    {
        return $this->belongsTo("App\Designation",'designation_id','id');
    }

    public function day()
    {
        return $this->belongsTo('App\Day');
    }

    public function time()
    {
        return $this->belongsTo("App\Time");
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking', 'doctor_name', 'id');
    }
}
