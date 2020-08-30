<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientCV extends Model
{
	protected $table='patient_cvs';
    public function patient()
    {
    	return $this->belongsTo('\App\Patient');
    }
}
