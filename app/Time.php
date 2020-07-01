<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['time'];

    public function doctor()
    {
        return $this->belongsTo("App\Doctor");
    }
}
