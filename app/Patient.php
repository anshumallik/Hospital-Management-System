<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'phone'
    ];

    public function booking()
    {
        return $this->hasMany('App\Booking','patient_id','id');
    }



}
