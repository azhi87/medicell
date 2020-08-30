<?php

namespace App\Http\Controllers;

use App\Treatment;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TreatmentController extends Controller

{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('treatments');
    }

    public function edit($id)
    {
        $patient=\App\Patient::find($id);
        return view('editPatient',compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id=0)
    {
    	$this->validate(request(),[
    		"tr_name"=>"required|min:1",
    		]);
        if($id==0)
        {
            $treatment=new Treatment();
            $message=' Saved';
        }
    	else
        {
            $treatment=Treatment::findOrFail($id);
            $message='Changed';
        }
    	$treatment->tr_name=request('tr_name');
    	$treatment->tr_code=request('tr_code');
    	$treatment->tr_description=request('tr_description');
    	
    	if($treatment->save())
        return redirect('/treatment'); 
        
     
    }
}
