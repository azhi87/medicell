<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NExam extends Model
{
    protected $table='neurological_exam';
    public function patient()
    {
    	return $this->belongsTo('\App\Patient','patient_id');
    }
}
