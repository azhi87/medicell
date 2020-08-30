<?php

namespace App\Http\Controllers;
use \App\Maintest;
use Illuminate\Http\Request;

class MaintestController extends Controller
{
	  public function index()
    {
        return view('maintests');
    }

    public function edit($id)
    {
        $mt=\App\Maintest::find($id);
        return view('editMainTest',compact('mt'));
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
    		"name"=>"required|min:1",
    		]);
        if($id==0)
        {
            $mt=new Maintest();
            $message=' Saved';
        }
    	else
        {
            $mt=Maintest::findOrFail($id);
            $message='Changed';
        }
    	$mt->name=request('name');
    	$mt->code=request('code');
    	$mt->description=request('description');
    	
    	if($mt->save())
        return redirect('/maintests'); 
        
     
    }
}
