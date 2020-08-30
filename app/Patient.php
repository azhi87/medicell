<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function visitations()
    {
    	return $this->hasMany('\App\Visitation','patient_id');
    }
    
    public function treatments()
    {	
    	return $this->belongsToMany('App\Treatment')->withPivot('pt_tr_note')->withTimestamps();

    }
     public function subtests()
    {
       return $this->belongsToMany('App\Subtest','patients','visit_id')->withPivot('subtest_id','patient_id','result','sale_price','status','id')->withTimestamps();
    }
    

    public function images()
    {
    	return $this->HasMany('\App\Image');
    }
    public function maritalStatusText()
    {
        if($this->marital_status==1)
        {
            return 'Married';
        }
        else
        {
            return 'Single';
        }
    }
}
