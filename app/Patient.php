<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = false;
    protected $fillable = ['national_id', 'name', 'age', 'mobile_number'];

    // public function patientReport()
    // {
    //     return $this->hasMany('App\PatientReports', 'id', 'patient_id');
    // }
}
