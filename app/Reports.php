<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $table = "reports";
    protected $fillable = ['patient_id', 'wbc', 'neno', 'lymno', 'mono', 'eono', 'bano', 'hb', 'hct', 'mcv', 'plt', 'disease', 'next_date', 'doctor_comment', 'pdf_name'];

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id', 'id');
    }
}
