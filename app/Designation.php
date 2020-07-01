<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function doctor()
    {
        return $this->belongsTo("App\Doctor",'doctor_id','id');
    }

    public function booking()
    {
        return $this->hasMany('App\Booking', 'designation_name', 'id');
    }
}
