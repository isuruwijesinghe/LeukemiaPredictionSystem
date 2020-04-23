<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = false;
    protected $fillable = ['national_id', 'name', 'age', 'gender', 'mobile_number', 'email'];

    public function Report()
    {
        return $this->hasMany('App\Reports', 'id', 'patient_id');
    }
}
