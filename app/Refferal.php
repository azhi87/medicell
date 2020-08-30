<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    public function visitations()
    {
    	return $this->hasMany('\App\Visitation','referral_dr');
    }
    
}
