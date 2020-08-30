<?php

namespace App\Http\Controllers;
use \App\Subtest;
use Illuminate\Http\Request;

class SubtestController extends Controller
{
     public function index()
    {
        return view('subtests');
    }

    public function edit($id)
    {
        $st=\App\Subtest::find($id);
        return view('editSubtest',compact('st'));
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
            "maintest_id"=>"required",
            "sale_price"=>"required"
    		]);
        if($id==0)
        {
            $st=new Subtest();
            $message=' Saved';
        }
    	else
        {
            $st=Subtest::findOrFail($id);
            $message='Changed';
        }
    	$st->name=request('name');
    	$st->maintest_id=request('maintest_id');
    	$st->normal_range=request('normal_range');
        $st->unit=request('unit');
        $st->sale_price=request('sale_price');
    	$st->description=request('description');
    	$st->instrument=request('instrument');
    	$st->default_value=request('default_value');
    	
    	if($st->save())
        return redirect('/subtests');
     
    }}
