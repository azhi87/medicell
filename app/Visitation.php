<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Visitation extends Model
{
    public function patient()
    {
        return $this->belongsTo('\App\Patient','patient_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User','user_id');
    }
    public function treatments()
    {	
    	return $this->belongsToMany('App\Treatment','patient_treatment','visit_id')->withPivot('pt_tr_note','patient_id','id')->withTimestamps();

    }
    public function subtests()
    {
       return $this->belongsToMany('App\Subtest','investigations','visit_id')->withPivot('subtest_id','patient_id','result','negative','id')->withTimestamps();
    }
    public function maintests()
    {
        $maintest=array();
        foreach ($this->subtests as $key => $value) {
            $maintest[$key]=$value->maintest->id;
        }
        return $maintest;
    }
    
    public function in()
    {
    	return $this->hasOne('\App\Investigation','visit_id');
    }
    public function subtest($subtest_id)
    {
        $result=DB::table('investigations')->where('visit_id',$this->id)->where('subtest_id',$subtest_id)->count();
        if($result==1)
            return true;
        else
            return false;
    }

    public function refferal()
    {
    	return $this->belongsTo('\App\Refferal','referral_dr');
    }

    public function te()
    {
    	return $this->hasOne('\App\TreatmentExtra','visit_id');
    }

    public function totalToday()
    {
      
        return $this->whereDate('created_at',Carbon::today())->sum('total');
    } 
    public function countToday()
    {
      
        return $this->whereDate('created_at',Carbon::today())->count();
    } 
    public function occ()
    {
    	return $this->belongsTo('\App\Occupation','occupation_id');
    }
    public function images()
    {
    	return $this->HasMany('\App\Image','visit_id');
    }
}
