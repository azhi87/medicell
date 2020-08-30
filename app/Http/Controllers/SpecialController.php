<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function index()
    {
    	return view('specials');
    }

    public function store(Request $request)
    {
    	 DB::table('specials')->delete();
        if(isset($request['urine']))
        {

        foreach($request['urine'] as $key => $value) {
            $ci= new \App\Special();
            $ci->subtest_id=$value;
            $ci->category="urine";
            $ci->save();
        }
        }

        if(isset($request['sfa']))
        {

        foreach($request['sfa'] as $key => $value) {
            $ci= new \App\Special();
            $ci->subtest_id=$value;
            $ci->category="sfa";
            $ci->save();
        }
        }

        if(isset($request['stool']))
        {

        foreach($request['stool'] as $key => $value) {
            $ci= new \App\Special();
            $ci->subtest_id=$value;
            $ci->category="stool";
            $ci->save();
        }
        }
        
        return redirect('/specials'); 
    }

    public function ajaxCall()
    {
    	$tests=DB::table('specials')->where('category',Request('id'))->select('subtest_id')->get();
    	return $tests;

    }
}
