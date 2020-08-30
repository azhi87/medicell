<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentExtra extends Model
{
    protected $table='treatment_extra';
    public function patient()
    {
    	return $this->belongsTo('\App\Patient','patient_id');
    }
    public function visitation()
    {
    	return $this->belongsTo('\App\Visitation','visit_id');
    }
}
