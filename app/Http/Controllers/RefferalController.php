<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Refferal;
class RefferalController extends Controller
{
	  public function index()
    {
        return view('refferals');
    }

    public function edit($id)
    {
        $re=\App\Refferal::find($id);
        return view('editRefferal',compact('re'));
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
            $re=new Refferal();
            $message=' Saved';
        }
    	else
        {
            $re=Refferal::findOrFail($id);
            $message='Changed';
        }
    	$re->name=request('name');
    	$re->id=request('id');

    	if($re->save())
        return redirect('/refferal'); 
    }
}