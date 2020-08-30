<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintest extends Model
{
    //
    public function subtests()
    {
    	return $this->hasMany('\App\Subtest');
    }
}
