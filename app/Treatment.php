<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    public function patient()
    {	
    	return $this->belongsToMany('App\Patient')->withPivot('pt_tr_note')->withTimestamps();
    }
    public function visitation()
    {
    	return $this->belongsTo('\App\Visitation','visit_id');
    }


}

