<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemReview extends Model
{
    protected $table='system_reviews';
    public function patient()
    {
    	return $this->belongsTo('\App\Patient','patient_id');
    }
    public function visitation()
    {
    	return $this->belongsTo('\App\Visitation','visit_id');
    }
}
