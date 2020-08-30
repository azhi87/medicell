<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    protected $table='investigations';
    public function patient()
    {
    	return $this->belongsTo('\App\Patient','patient_id');
    }
    public function visitation()
    {
    	return $this->belongsTo('\App\Visitation','visit_id');
    }
}
