<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Subtest extends Model
{
    public function maintest()
    {
    	return $this->belongsTo('\App\Maintest');
    }

    public function category()
    {
    	$category=DB::table('specials')->where('subtest_id',$this->id)->value('category');
    	return $category;
    }
}
